<?php

namespace App\Http\Controllers\Auth\Verification;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VerificationController extends Controller
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
     * Display verification alert page.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id)
    {
        return view('auth.verification', compact('id'));
    }

    /**
     * Resend Verify Email.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function resend($id)
    {
        $user = $this->user->find($id);

        $resend = $this->user->sendVerifyEmail($user);

        if (!$resend) {
            return back()->with('error', 'Something went wrong!');
        }

        return back()->with('success', 'A fresh verification link has been re-sent to your email address.');
    }


    /**
     * Verify register information.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function verify($id)
    {
        $user = $this->user->find($id);

        //if user does not exist
        if (!$user) {
            return redirect()->route('auth.login')->with('error', 'Ohh. User does not exist..');
        }

        //verify user, update email_verified_at column
        $verify = $this->user->verifyUser($user);

        if (!$verify) {
            return redirect()->route('auth.login')->with('error', 'Something went wrong!');
        }

        return redirect()->route('auth.login')->with('success', 'Your email has been verified! You can now login.');
    }
}
