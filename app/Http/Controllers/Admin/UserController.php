<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('admin.users.list');
    }

    /**
     * Display all user groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function group()
    {
        return view('admin.groups.list');
    }
}
