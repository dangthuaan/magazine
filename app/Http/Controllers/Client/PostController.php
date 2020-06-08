<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display list of posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.posts.index');
    }
}
