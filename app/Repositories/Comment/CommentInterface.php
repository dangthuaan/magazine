<?php

namespace App\Repositories\Comment;

use App\Repositories\Base\BaseInterface;

interface CommentInterface extends BaseInterface
{
    /**
     * Store new comment.
     *
     * @param $data
     * @return bool
     */
    public function new($data);

    /**
     * Update comment.
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function edit($id, $data);
}
