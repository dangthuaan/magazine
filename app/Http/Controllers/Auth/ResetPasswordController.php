<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailResetRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Repositories\User\UserInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ResetPasswordController extends Controller
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
     * Display Reset Password Page
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('auth.password.email');
    }

    /**
     * Send Reset Password email.
     *
     * @param EmailResetRequest $request
     * @return RedirectResponse
     */
    public function mail(EmailResetRequest $request)
    {
        $email = $request->email;

        $userEmailValid = $this->user->checkValidEmail($email);

        if (!$userEmailValid) {
            return back()->with('error', 'Your email is not match with your account, please try again!');
        }

        $this->user->createNewResetToken($email);


        $sendEmail = $this->user->sendResetEmail($email);

        if (!$sendEmail) {
            return back()->with('error', 'Something went wrong!');
        }

        return back()->with('success', 'Success. We have emailed your password reset link!');
    }

    /**
     * Show Reset Password page.
     *
     * @param $token
     * @return RedirectResponse
     */
    public function form($token)
    {
        $checkToken = $this->user->checkResetToken($token);

        if (!$checkToken) {
            return redirect()->route('auth.password')
                ->with('error', 'Sorry. Your password reset link has been expired. Let\'s try again.');
        }

        return view('auth.password.reset', compact('token'));
    }

    /**
     * Reset password.
     *
     * @param PasswordResetRequest $request
     * @param $token
     * @return RedirectResponse
     */
    public function reset(PasswordResetRequest $request, $token)
    {
        $checkToken = $this->user->checkResetToken($token);

        if (!$checkToken) {
            return redirect()->route('auth.password')
                ->with('error', 'Sorry. Your password reset link has been expired. Let\'s try again.');
        }

        $resetPassword = $this->user->resetPassword($token, $request->password);

        if (!$resetPassword) {
            return back()->with('error', 'Something went wrong!');
        }

        return redirect()->route('auth.login')
            ->with('success', 'Your password has been changed successfully!');
    }
}
