<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Permission\PermissionInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class RoleRepository extends BaseRepository implements RoleInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Model Permission
     */
    protected $permission;

    /**
     * Base Constructor
     *
     * @param Role $model
     * @param PermissionInterface $permission
     */
    public function __construct(Role $model, PermissionInterface $permission)
    {
        parent::__construct($model);
        $this->permission = $permission;
    }

    /**
     * Store new role.
     *
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function new($data, $return_object = false)
    {
        try {
            $newRole = $this->create($data);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return $return_object ? $newRole : true;
    }

    /**
     * Update role.
     *
     * @param $id
     * @param $data
     * @return bool
     *
     */
    public function edit($id, $data)
    {
        try {
            $this->update($id, $data);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Destroy role.
     *
     * @param $id
     * @return bool
     * @throws Throwable
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $role = $this->findWith(['permissions'], $id);

            $this->permission->detachPermissionRole($role);

            $this->detachRoleUser($role);

            $this->delete($id);

            DB::commit();

        } catch (Throwable $th) {
            Log::error($th);

            DB::rollBack();

            return false;
        }

        return true;
    }

    /**
     * Detach Role User.
     *
     * @param $user
     * @return bool
     */
    public function detachRoleUser($user)
    {
        try {
            $user->roles()->detach();

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Attach Role User.
     *
     * @param $user
     * @param $roles
     * @return bool
     */
    public function attachRoleUser($user, $roles)
    {
        try {
            $user->roles()->attach($roles);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Sync Role User.
     *
     * @param $user
     * @param $roles
     * @return bool
     */
    public function syncRoleUser($user, $roles)
    {
        try {
            $user->roles()->sync($roles);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
