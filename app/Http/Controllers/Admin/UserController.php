<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
     * Register User Constructor
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display all users.
     *
     * @return Application|Factory|View
     */
    public function list()
    {
        $users = $this->user->list('desc', 10);

        if (!$users) {
            return view('admin.users.list', ['failed' => true]);
        }

        return view('admin.users.list', compact('users'));
    }

    /**
     * Display all user groups.
     *
     * @return Application|Factory|View
     */
    public function group()
    {
        return view('admin.groups.list');
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
     * @return RedirectResponse
     */
    public function search(Request $request)
    {
        $usersResult = $this->user->search($request->search,
            ['first_name', 'last_name', 'username', 'email', 'location', 'phone']);

        if (!$usersResult) {
            return back()->with('error', 'Something went wrong!');
        }

        return view('admin.users.list', ['users' => $usersResult]);

    }
}
