<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'cover',
        'title',
        'content'
    ];

    /**
     * relationship with user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * relationship with comments.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
