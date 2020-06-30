<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailResetRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Repositories\Profile\ProfileInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Throwable;

class ProfileController extends Controller
{
    /**
     * @var Model User
     */
    protected $profile;

    /**
     * @var Model User
     */
    protected $user;

    /**
     * Register User Constructor
     *
     * @param ProfileInterface $profile
     * @param UserInterface $user
     */
    public function __construct(ProfileInterface $profile, UserInterface $user)
    {
        $this->profile = $profile;
        $this->user = $user;
    }

    /**
     * Display profile overview page.
     *
     * @param $username
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function overview($username)
    {
        $this->authorize('overviewProfile', User::class);

        $user = $this->profile->find($username, '=', 'username');

        return view('admin.profile.overview', compact('user'));
    }

    /**
     * Display change password page.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function password()
    {
        $this->authorize('updateProfile', User::class);

        return view('admin.profile.password', ['user' => Auth::user()]);
    }

    /**
     * Update profile information.
     *
     * @param ProfileRequest $request
     * @param $username
     * @return JsonResponse
     *
     * @throws AuthorizationException
     * @throws Throwable
     */
    public function update(ProfileRequest $request, $username)
    {
        $this->authorize('updateProfile', User::class);

        $data = $request->except(['email', 'username', '_token']);

        if ($request->hasFile('avatar')) {
            $avatar = $this->profile->avatar($request->avatar);

            $data['avatar'] = $avatar;
        }

        $updateProfile = $this->profile->update(Auth::id(), $data);


        if (!$updateProfile) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.profile.main', ['user' => $this->user->find($username, '=', 'username')])->render(),
        ]);
    }

    /**
     * Update password.
     *
     * @param PasswordChangeRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function updatePassword(PasswordChangeRequest $request)
    {
        $this->authorize('updateProfile', User::class);

        $updatePassword = $this->profile->update(Auth::id(), ['password' => Hash::make($request->new_password)]);

        if (!$updatePassword) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
        ]);
    }

    /**
     * Send Reset Password email.
     *
     * @param EmailResetRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function forgotPassword(EmailResetRequest $request)
    {
        $this->authorize('updateProfile', User::class);

        $email = $request->email;

        $userEmailValid = $this->user->checkValidEmail($email);

        if (!$userEmailValid) {
            return response()->json([
                'email' => false,
            ]);
        }

        $this->user->createNewResetToken($email);


        $sendEmail = $this->user->sendResetEmail($email);

        if (!$sendEmail) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
        ]);
    }

}
