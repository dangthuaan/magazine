<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Post\PostInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

class HomeController extends Controller
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
     * Display Home page.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = $this->post->list(['categories', 'user', 'comments'], 'desc',
            config('pagination.feature_posts'));

        list($featured, $more) = $posts->partition(function ($item) {
            return $item->cover != null;
        });

        $posts = $featured->merge($more);


        return view('client.home.index_2', compact('posts'));
    }
}
