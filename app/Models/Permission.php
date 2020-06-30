<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description'
    ];

    /**
     * relationship with roles.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    /**
     * get exception permissions.
     * @return bool
     */
    public function isException()
    {
        return in_array($this->code,
            [
                'profile_create',
                'profile_delete',
                'user_create',
                'user_delete'
            ]);
    }
}
