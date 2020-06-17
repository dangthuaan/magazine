<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display Home page.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('client.home.index');
    }
}
