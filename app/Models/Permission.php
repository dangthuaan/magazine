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
        return $this->belongsToMany('App\Models\Role');
    }
}
