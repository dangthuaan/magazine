<?php

namespace App\Repositories\Post;

use App\Repositories\Base\BaseInterface;

interface PostInterface extends BaseInterface
{
    /**
     * Store new post.
     *
     * @param $userId
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function new($userId, $data, $return_object = false);

    /**
     * Attach Category Post.
     *
     * @param $post
     * @param $categoryIds
     * @return bool
     */
    public function attachCategory($post, $categoryIds);

    /**
     * Detach Category Post.
     *
     * @param $post
     * @return bool
     */
    public function detachCategory($post);

    /**
     * Sync Category Post.
     *
     * @param $post
     * @param $categoryIds
     * @return bool
     */
    public function syncCategory($post, $categoryIds);

    /**
     * Update post.
     *
     * @param $userId
     * @param $id
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function edit($userId, $id, $data, $return_object = false);

    /**
     * Destroy post.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id);
}
