<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * @var Model User
     */
    protected $user;

    /**
     * Register User Constructor
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Authenticate User.
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function authenticate(LoginRequest $request)
    {
        $authentication = $this->user->authenticate($request->only('username', 'password'));

        if ($authentication) {
            return redirect()->route('client.index');
        }

        return back()->with('error', 'Something went wrong!');
    }
}
