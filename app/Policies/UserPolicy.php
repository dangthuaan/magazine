<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view user profile.
     *
     * @param User $user
     * @return bool
     */
    public function overviewProfile(User $user)
    {
        return $user->hasPermission('profile_read');
    }

    /**
     * Determine whether the user can update their profile.
     *
     * @param User $user
     * @return bool
     */
    public function updateProfile(User $user)
    {
        return $user->hasPermission('profile_update') && $user->id === Auth::id();
    }

    /**
     * Determine whether the user can view list of users.
     *
     * @param User $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('user_read');
    }

    /**
     * Determine whether the user can update(block) specific user.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermission('user_update');
    }
}
