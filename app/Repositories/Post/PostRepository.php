<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Throwable;

class PostRepository extends BaseRepository implements PostInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Constructor
     *
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    /**
     * Store new post.
     *
     * @param $userId
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function new($userId, $data, $return_object = false)
    {
        $data['user_id'] = $userId;

        try {
            if (isset($data['cover'])) {
                $data['cover'] = $this->file($userId, $data['cover'], 'cover');
            }

            $newPost = $this->create($data);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return $return_object ? $newPost : true;
    }

    /**
     * Attach Category Post.
     *
     * @param $post
     * @param $categoryIds
     * @return bool
     */
    public function attachCategory($post, $categoryIds)
    {
        try {
            if (is_null($categoryIds)) {
                return true;
            }

            $post->categories()->attach($categoryIds);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Detach Category Post.
     *
     * @param $post
     * @return bool
     */
    public function detachCategory($post)
    {
        try {
            if (!$post->categories) {
                return true;
            }

            $post->categories()->detach();
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Sync Category Post.
     *
     * @param $post
     * @param $categoryIds
     * @return bool
     */
    public function syncCategory($post, $categoryIds)
    {
        try {
            $post->categories()->sync($categoryIds);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Update post.
     *
     * @param $userId
     * @param $id
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function edit($userId, $id, $data, $return_object = false)
    {
        try {
            if (!isset($data['cover'])) {

                switch ($data['old_cover']) {
                    case "yes":
                        unset($data['cover']);
                        break;
                    case "no":
                        $data['cover'] = null;
                        break;
                    default:
                        return false;
                        break;
                }

            } else {
                $data['cover'] = $this->file($userId, $data['cover'], 'cover');
            }

            unset($data['old_cover']);

            $updatedPost = $this->update($id, $data);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return $return_object ? $updatedPost : true;
    }

    /**
     * Remove number of elements from array.
     *
     * @param $array
     * @param $element
     * @param $number
     * @return array
     */
    public function removeFromArray($array, $element, $number)
    {
        return array_splice($array, array_search($element, $array), $number);
    }

    /**
     * Destroy post.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        try {
            $this->delete($id);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Restore post.
     *
     * @param $id
     * @return bool
     */
    public function restore($id)
    {
        try {
            Post::withTrashed()->findorfail($id)->restore();

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
