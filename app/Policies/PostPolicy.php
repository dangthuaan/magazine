<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view list of posts.
     *
     * @param User $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('post_read');
    }

    /**
     * Determine whether the user can create post.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('post_create');
    }

    /**
     * Determine whether the user can update post.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->hasPermission('post_update') && $user->id === $post->user->id;
    }

    /**
     * Determine whether the user can delete post.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->hasPermission('post_delete') && $user->id === $post->user->id;
    }
}
