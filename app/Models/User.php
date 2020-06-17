<?php

namespace App\Models;

use Eloquent;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * User
 *
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'avatar',
        'password',
        'location',
        'phone'
    ];

    /**
     * relationship with role.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }
}
