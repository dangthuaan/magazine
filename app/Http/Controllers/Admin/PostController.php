<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Post\PostInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class PostController extends Controller
{
    /**
     * @var Model Category
     */
    protected $category;

    /**
     * @var Model Post
     */
    protected $post;

    /**
     * Register Category and Post Constructor
     *
     * @param CategoryInterface $category
     * @param PostInterface $post
     */
    public function __construct(CategoryInterface $category, PostInterface $post)
    {
        $this->category = $category;
        $this->post = $post;
    }

    /**
     * Display add new post form.
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function form()
    {
        $categories = $this->category->all(['childs']);

        return response()->json([
            'html' => view('admin.posts.modals.create_body', compact('categories'))->render()
        ]);
    }

    /**
     * Display all posts.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function list()
    {
        $this->authorize('view', Post::class);

        $posts = $this->post->list(['user', 'categories'], 'desc', config('pagination.posts'));

        $categories = $this->category->all(['childs']);

        return view('admin.posts.list', compact('posts', 'categories'));
    }

    /**
     * Store a new post.
     *
     * @param PostRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(PostRequest $request)
    {
        $this->authorize('create', Post::class);

        DB::beginTransaction();

        try {
            $newPost = $this->post->new(Auth::id(), $request->except('_token'), true);

            $this->post->attachCategory($newPost, $request->categories);

            DB::commit();

        } catch (Throwable $th) {
            Log::error($th);

            DB::rollBack();

            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.posts.each', ['post' => $newPost])->render()
        ]);
    }

    /**
     * Display specific post.
     *
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function show($id)
    {
        $this->authorize('update', Post::class);

        $post = $this->post->findWith('categories', $id);

        $categories = $this->category->all(['childs']);

        if (!$post) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.posts.modals.edit_form', compact('post', 'categories'))->render()
        ]);
    }

    /**
     * Update specific post.
     *
     * @param PostRequest $request
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(PostRequest $request, $id)
    {
        $this->authorize('update', Post::all());

        DB::beginTransaction();

        try {
            $this->post->edit(Auth::id(), $id,
                $request->only('cover', 'old_cover', 'title', 'content'),
                true);

            $this->post->syncCategory($this->post->find($id), $request->categories);

            DB::commit();

        } catch (Throwable $th) {
            Log::error($th);

            DB::rollBack();

            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.posts.each_body', ['post' => $this->post->find($id)])->render(),
        ]);
    }

    /**
     * Remove specific post.
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('delete', Post::class);

        $remove = $this->post->destroy($id);

        return response()->json([
            'status' => $remove
        ]);
    }

    /**
     * Restore removed post.
     *
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function restore($id)
    {
        $restorePost = $this->post->restore($id);

        if (!$restorePost) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.posts.each_body', ['post' => $this->post->find($id)])->render(),
        ]);
    }

    /**
     * Search.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function search(Request $request)
    {
        $this->authorize('view', Post::class);

        $postResult = $this->post->search($request->search,
            ['title', 'content'], ['categories']);

        $categories = $this->category->all(['childs']);

        if (!$postResult) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.posts.list_body', ['posts' => $postResult, 'categories' => $categories])->render()
        ]);

    }
}
