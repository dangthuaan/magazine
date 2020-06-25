<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Repositories\Comment\CommentInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class CommentController extends Controller
{
    /**
     * @var Model Comment
     */
    protected $comment;

    /**
     * Register Comment Constructor
     *
     * @param CommentInterface $comment
     */
    public function __construct(CommentInterface $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(Request $request, $id)
    {
        $storeComment = $this->comment->new($id, $request->only('content'), true);

        if (!$storeComment) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
            'each' => view('client.posts.single.comments.each', ['comment' => $storeComment])->render()
        ]);
    }

    /**
     * Get edit content of specific comment.
     *
     * @param $id
     * @return JsonResponse
     * @throws Exception
     */
    public function edit($id)
    {
        $comment = $this->comment->find($id);

        if (!$comment) {
            return response()->json([
                'status' => false
            ]);
        }
        return response()->json([
            'status' => true,
            'content' => $comment->content,
        ]);
    }

    /**
     * Get edit content of specific comment.
     *
     * @param CommentRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CommentRequest $request, $id)
    {
        $update = $this->comment->edit($id, $request->only('content'));

        return response()->json([
            'status' => $update
        ]);
    }

    /**
     * Remove specific comment.
     *
     * @param $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $remove = $this->comment->remove($id);

        return response()->json([
            'status' => $remove
        ]);
    }
}
