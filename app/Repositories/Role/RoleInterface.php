<?php

namespace App\Repositories\Role;

use App\Repositories\Base\BaseInterface;

interface RoleInterface extends BaseInterface
{
    /**
     * Store new role.
     *
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function new($data, $return_object = false);

    /**
     * Update new role.
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function edit($id, $data);

    /**
     * Destroy role.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id);

    /**
     * Attach Role User.
     *
     * @param $user
     * @param $roles
     * @return bool
     */
    public function attachRoleUser($user, $roles);

    /**
     * Sync Role User.
     *
     * @param $user
     * @param $roles
     * @return bool
     */
    public function syncRoleUser($user, $roles);

    /**
     * Detach Role User.
     *
     * @param $user
     * @return bool
     */
    public function detachRoleUser($user);
}
