<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display Home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.home.index');
    }
}
