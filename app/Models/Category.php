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
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    /**
     * self relationship.
     */
    public function childs()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    /**
     * relationship with posts.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }

    /**
     * check if parent category.
     *
     * @return boolean
     */
    public function isParent()
    {
        return is_null($this->parent_id);
    }

    /**
     * check if category is category of specific post.
     *
     * @param $post
     * @return boolean
     */
    public function isPostCategories($post)
    {
        return in_array($this->id, $post->categories->pluck('id')->all());
    }
}
