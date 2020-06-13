<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'content'
    ];

    /**
     * self relationship.
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Comment');
    }

    /**
     * self relationship.
     */
    public function childs()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * relationship with user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * relationship with posts.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
