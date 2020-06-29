<?php

namespace App\Repositories\Permission;

use App\Repositories\Base\BaseInterface;

interface PermissionInterface extends BaseInterface
{
    /**
     * Attach Permission Role.
     *
     * @param $role
     * @param $permissions
     * @return bool
     */
    public function attachPermissionRole($role, $permissions);

    /**
     * Sync Permission Role.
     *
     * @param $role
     * @param $permissions
     * @return bool
     */
    public function syncPermissionRole($role, $permissions);

    /**
     * Detach Permission Role.
     *
     * @param $role
     * @return bool
     */
    public function detachPermissionRole($role);
}
