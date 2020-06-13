<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
