<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\Role\RoleInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
     * Register Role Constructor
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
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Throwable
     */
    public function show($id)
    {
        $role = $this->role->findWith(['permissions'], $id);

        $permissions = $this->permission->all(['roles']);

        if (!$role) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.groups.modals.role_body', ['role' => $role, 'permissions' => $permissions])->render()
        ]);
    }


    /**
     * Update permission role.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);


        $attachPermissionRole = $this->permission->syncPermissionRole($role, $request->permissions);

        return response()->json([
            'status' => $attachPermissionRole
        ]);
    }
}
