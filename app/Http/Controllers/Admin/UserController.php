<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class UserController extends Controller
{
    /**
     * @var Model User
     */
    protected $user;

    /**
     * @var Model Role
     */
    protected $role;

    /**
     * Register User Constructor
     *
     * @param UserInterface $user
     * @param RoleInterface $role
     */
    public function __construct(UserInterface $user, RoleInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display assign role form.
     *
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function showRole($id)
    {
        $this->authorize('update', User::class);

        $user = $this->user->findWith(['roles'], $id);

        $roles = $this->role->all(['users']);

        if (!$user || !$roles) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.users.modals.group_body', compact('user', 'roles'))->render()
        ]);
    }

    /**
     * Assign role to specific user.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function assignRole(Request $request, $id)
    {
        $this->authorize('update', User::class);

        $user = $this->user->find($id);

        $assignRole = $this->role->syncRoleUser($user, $request->roles);

        if (!$assignRole) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.users.each', compact('user'))->render()
        ]);
    }

    /**
     * Display all users.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function list()
    {
        $this->authorize('view', User::class);

        $users = $this->user->findAllWith(['roles'], null, '!=', $attribute = 'email_verified_at');

        $roles = $this->role->all(['users']);

        if (!$users) {
            return view('admin.users.list', ['failed' => true]);
        }

        return view('admin.users.list', compact('users', 'roles'));
    }

    /**
     * Block user.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function block(Request $request)
    {
        $this->authorize('update', User::class);

        $blockUser = $this->user->block($request->user_id);

        if (!$blockUser) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.users.each', [
                'user' => $this->user->find($request->user_id)
            ])->render()
        ]);
    }

    /**
     * Unblock user.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function unblock(Request $request)
    {
        $this->authorize('update', User::class);

        $blockUser = $this->user->unblock($request->user_id);

        if (!$blockUser) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.users.each', [
                'user' => $this->user->find($request->user_id)
            ])->render()
        ]);
    }

    /**
     * Search.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Throwable
     */
    public function search(Request $request)
    {
        $this->authorize('view', User::class);

        $usersResult = $this->user->search($request->search,
            ['first_name', 'last_name', 'username', 'email', 'location', 'phone']);

        if (!$usersResult) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.users.body', ['users' => $usersResult])->render()
        ]);
    }
}
