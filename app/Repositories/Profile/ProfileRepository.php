<?php

namespace App\Repositories\Profile;

use App\Models\User;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProfileRepository extends BaseRepository implements ProfileInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Constructor
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Update User Avatar.
     *
     * @param $image
     * @return string
     */
    public function avatar($image)
    {
        $fileName = Auth::id() . '_' . $image->getClientOriginalName();

        try {
            $image->storeAs('/' . Auth::id(), $fileName, 'avatar');

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return $fileName;
    }

    /**
     * Check current password and password provided.
     *
     * @param $current
     * @return bool
     */
    public function checkCurrentPassword($current)
    {
        return Hash::check($current, Auth::user()->password);
    }

    /**
     * Check current password and new password provided.
     *
     * @param $current
     * @param $new
     * @return bool
     */
    public function checkNewPassword($current, $new)
    {
        return strcmp($current, $new) == 0;
    }
}
