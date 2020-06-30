<?php

namespace App\Models;

use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    /**
     * check if current user.
     *
     * @return bool
     */
    public function isCurrentUser()
    {
        return $this->id == Auth::id();
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

    /**
     * List users with verified email.
     *
     * @param $query
     * @return bool
     */
    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    /**
     * Accessor: get uppercase first letter of first name.
     *
     * @return string
     */
    public function getFirstLetterOfFirstNameAttribute()
    {
        return ucfirst(mb_substr($this->first_name, 0, 1, "UTF-8"));
    }

    /**
     * Get full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Scope order by desc.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrderByDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Get formatted joined date.
     *
     * @return string
     * @throws Exception
     */
    public function joined()
    {
        return Carbon::parse($this->email_verified_at)->format('d-m-Y');
    }

    /**
     * Check is blocked or not.
     *
     * @return boolean
     */
    public function isBlocked()
    {
        return $this->is_block;
    }
    

}
