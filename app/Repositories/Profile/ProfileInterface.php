<?php

namespace App\Repositories\Profile;

use App\Repositories\Base\BaseInterface;
use Illuminate\Http\Response;

interface ProfileInterface extends BaseInterface
{
    /**
     * Update User Avatar.
     *
     * @param $image
     * @return Response
     */
    public function avatar($image);

    /**
     * Check current password and password provided.
     *
     * @param $current
     * @return bool
     */
    public function checkCurrentPassword($current);

    /**
     * Check current password and new password provided.
     *
     * @param $current
     * @param $new
     * @return bool
     */
    public function checkNewPassword($current, $new);
}
