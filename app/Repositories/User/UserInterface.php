<?php

namespace App\Repositories\User;

use App\Repositories\Base\BaseInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

interface UserInterface extends BaseInterface
{
    /**
     * Register.
     *
     * @param array $data
     * @param bool $return_object
     * @return Response
     */
    public function register($data, $return_object = false);

    /**
     * Send Verify Email.
     *
     * @param $user
     * @return bool
     */
    public function sendVerifyEmail($user);

    /**
     * Verify User.
     *
     * @param $user
     * @return bool
     */
    public function verifyUser($user);

    /**
     * Authenticate user.
     *
     * @param $credentials
     * @param bool $remember
     * @return Boolean
     */
    public function authenticate($credentials, $remember);

    /**
     * Check verified user.
     *
     * @param $username
     * @return Boolean
     */
    public function checkVerifiedUser($username);

    /**
     * Logout
     *
     */
    public function logout();

    /**
     * Set remember token expire time
     *
     * @param $time
     */
    public function setRememberTokenTime($time);

    /**
     * Create Password Reset Token
     * @param $email
     * @return RedirectResponse
     */
    public function checkValidEmail($email);

    /**
     * Create Password Reset Token
     * @param $email
     * @return bool
     */
    public function createNewResetToken($email);

    /**
     * Create Password Reset Token
     * @param $email
     * @return bool
     */
    public function sendResetEmail($email);

    /**
     * Check Reset Password Token
     *
     * @param $token
     * @return bool
     */
    public function checkResetToken($token);

    /**
     * Check Reset Password Token
     *
     * @param $token
     * @param $password
     * @return bool
     */
    public function resetPassword($token, $password);
}
