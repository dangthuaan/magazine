<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class CommentRepository extends BaseRepository implements CommentInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Constructor
     *
     * @param Comment $model
     */
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    /**
     * Store new comment.
     *
     * @param $postId
     * @param $data
     * @param bool $object
     * @return bool
     */
    public function new($postId, $data, $object = false)
    {
        $data['post_id'] = $postId;
        $data['user_id'] = Auth::id();

        try {
            $newComment = $this->create($data);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return $object ? $newComment : true;
    }

    /**
     * Update comment.
     *
     * @param $id
     * @param $data
     * @return bool
     *
     */
    public function edit($id, $data)
    {
        try {
            $this->update($id, $data);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Destroy comment.
     *
     * @param $id
     * @return bool
     */
    public function remove($id)
    {
        try {
            $this->delete($id);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
