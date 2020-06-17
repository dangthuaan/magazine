<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\User\UserInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Authenticate User.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {
        //authenticate user
        $authentication = $this->user->authenticate($request->only('username', 'password'), $request->remember);

        if (!$authentication) {
            return back()->with('error', 'These credentials do not match our records.');
        }

        //check email is verified or not
        $checkVerify = $this->user->checkVerifiedUser($request->only('username'));

        if (!$checkVerify) {
            return back()->with('error',
                'You need to confirm your account. We have sent you an activation code, please check your email.');
        }

        //if "remember me" is checked
        if ($request->remember) {
            $this->user->setRememberTokenTime(config('remember.expire_time'));
        }

        return redirect()->route('client.index');
    }

    /**
     * Logout
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        $this->user->logout();

        return redirect()->route('client.index');
    }
}
