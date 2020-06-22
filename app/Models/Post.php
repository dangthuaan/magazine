<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

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

    /**
     * relationship with categories.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
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
}
