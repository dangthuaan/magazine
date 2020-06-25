<?php

namespace App\Repositories\Comment;

use App\Repositories\Base\BaseInterface;

interface CommentInterface extends BaseInterface
{
    /**
     * Store new comment.
     *
     * @param $postId
     * @param $data
     * @param bool $object
     * @return bool
     */
    public function new($postId, $data, $object = false);

    /**
     * Update comment.
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function edit($id, $data);

    /**
     * Destroy comment.
     *
     * @param $id
     * @return bool
     */
    public function remove($id);
}
