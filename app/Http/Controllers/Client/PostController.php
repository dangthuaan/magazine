<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Post\PostInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

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
     * Display list of posts.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('client.posts.index');
    }

    /**
     * Display a specific post.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $post = $this->post->find($id);

        $previous = $this->post->findAll($id, '<')->max('id');

        $next = $this->post->findAll($id, '>')->min('id');

        return view('client.posts.single.index', compact('post', 'previous', 'next'));
    }
}
