<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'description'
    ];

    /**
     * self relationship.
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * self relationship.
     */
    public function childs()
    {
        return $this->hasMany('App\Models\Category');
    }

    /**
     * relationship with posts.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
