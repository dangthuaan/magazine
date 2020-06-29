<?php

namespace App\Repositories\Permission;

use App\Models\Permission;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Throwable;

class PermissionRepository extends BaseRepository implements PermissionInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Constructor
     *
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    /**
     * Attach Permission Role.
     *
     * @param $role
     * @param $permissions
     * @return bool
     */
    public function attachPermissionRole($role, $permissions)
    {
        try {
            if (is_null($permissions)) {
                return true;
            }

            $role->permissions()->attach($permissions);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Sync Permission Role.
     *
     * @param $role
     * @param $permissions
     * @return bool
     */
    public function syncPermissionRole($role, $permissions)
    {
        try {
            $role->permissions()->sync($permissions);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Detach Permission Role.
     *
     * @param $role
     * @return bool
     */
    public function detachPermissionRole($role)
    {
        try {
            $role->permissions()->detach();

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
