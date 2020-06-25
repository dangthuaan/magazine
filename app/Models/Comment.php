<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

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
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
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
