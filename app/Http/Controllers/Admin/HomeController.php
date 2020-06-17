<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display Admin Home page.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.home.index');
    }

    /**
     * Login.
     *
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Register.
     *
     * @return Application|Factory|View
     */
    public function register()
    {
        return view('admin.register');
    }

    /**
     * Forgot.
     *
     * @return Application|Factory|View
     */
    public function forgot()
    {
        return view('admin.forgot');
    }
}
