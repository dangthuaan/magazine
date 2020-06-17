<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileRequest;
use App\Repositories\Profile\ProfileInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @var Model User
     */
    protected $profile;

    /**
     * Register User Constructor
     *
     * @param ProfileInterface $profile
     */
    public function __construct(ProfileInterface $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function overview()
    {
        return view('admin.profile.overview');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function password()
    {
        return view('admin.profile.password');
    }

    /**
     * Update profile information.
     *
     * @param ProfileRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $data = $request->except(['email', 'username', '_token']);

        if ($request->hasFile('avatar')) {
            $avatar = $this->profile->avatar($request->avatar);

            $data['avatar'] = $avatar;
        }

        $updateProfile = $this->profile->update(Auth::id(), $data);

        if (!$updateProfile) {
            return back()->with('error', 'Update Information Failed!');
        }

        return back()->with('success', 'Your Profile Information has been updated.');
    }

    /**
     * Update password.
     *
     * @param PasswordChangeRequest $request
     * @return RedirectResponse
     */
    public function updatePassword(PasswordChangeRequest $request)
    {
        $checkCurrentPassword = $this->profile->checkCurrentPassword($request->current_password);

        if (!$checkCurrentPassword) {
            return back()->with('error',
                'Your current password does not matches with the password you provided. Please try again.');
        }

        $checkNewPassword = $this->profile->checkNewPassword($request->current_password, $request->new_password);

        if ($checkNewPassword) {
            return back()->with('error',
                'New Password cannot be same as your current password. Please choose a different password.');
        }

        $updatePassword = $this->profile->update(Auth::id(), ['password' => Hash::make($request->new_password)]);

        if (!$updatePassword) {
            return back()->with('error', 'Update Password failed!');
        }

        return back()->with('success', 'Success! Your password has been updated.');

    }

}
