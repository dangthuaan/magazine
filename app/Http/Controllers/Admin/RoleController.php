<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\Role\RoleInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Throwable;

class RoleController extends Controller
{
    /**
     * @var Model Role
     */
    protected $role;

    /**
     * @var Model Permission
     */
    protected $permission;

    /**
     * Register Role and Permission Constructor
     *
     * @param RoleInterface $role
     * @param PermissionInterface $permission
     */
    public function __construct(RoleInterface $role, PermissionInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $roles = $this->role->all(['users']);

        return view('admin.groups.list', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(RoleRequest $request)
    {
        $newRole = $this->role->new($request->only('name', 'description'), true);

        if (!$newRole) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.groups.each', ['role' => $newRole])->render()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function edit($id)
    {
        $role = $this->role->find($id);

        if (!$role) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.groups.modals.edit_body', ['role' => $role])->render()
        ]);
    }

    /**
     * Update specific group.
     *
     * @param RoleRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(RoleRequest $request, $id)
    {
        $updateRole = $this->role->edit($id, $request->only('name', 'description'));

        $role = $this->role->find($id);


        if (!$updateRole) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.groups.each_body', ['role' => $role])->render()
        ]);
    }

    /**
     * Remove specific group.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $removeRole = $this->role->destroy($id);

        return response()->json([
            'status' => $removeRole
        ]);
    }
}
