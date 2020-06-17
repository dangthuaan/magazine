<?php

namespace App\Repositories\User;

use App\Mail\ResetPassword;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Repositories\Base\BaseRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class UserRepository extends BaseRepository implements UserInterface
{
    use ThrottlesLogins;

    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Constructor
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Register
     *
     * @param array $data
     * @param bool $return_object
     * @return bool
     */
    public function register($data, $return_object = false)
    {
        $data['password'] = Hash::make($data['password']);

        try {
            $newUser = $this->create($data);

            $this->sendVerifyEmail($newUser);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }


        return $return_object ? $newUser : true;
    }

    /**
     * Send Verify Email
     *
     * @param $user
     * @return bool
     */
    public function sendVerifyEmail($user)
    {
        try {
            Mail::to($user)->send(new VerifyEmail($user->id, Str::random(60)));

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Verify User
     *
     * @param $user
     * @return bool
     */
    public function verifyUser($user)
    {
        try {
            $this->update($user->id, ['email_verified_at' => now()]);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Check verified user.
     *
     * @param $username
     * @return Boolean
     */
    public function checkVerifiedUser($username)
    {
        $user = $this->find($username, 'username');

        if (is_null($user->email_verified_at)) {
            return false;
        }

        return true;
    }

    /**
     * Login
     *
     * @param array $credentials
     * @param bool $remember
     * @return Boolean
     */
    public function authenticate($credentials, $remember)
    {
        //check if user login by username or email
        $loginBy = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        try {
            Auth::attempt([$loginBy => $credentials['username'], 'password' => $credentials['password']], $remember);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return Auth::check();
    }

    /**
     * Logout
     *
     */
    public function logout()
    {
        Auth::logout();
    }

    /**
     * Set remember token expire time
     *
     * @param $time
     */
    public function setRememberTokenTime($time)
    {
        $rememberTokenName = Auth::getRecallerName();

        $cookieJar = Auth::guard()->getCookieJar();

        $cookieValue = $cookieJar->queued($rememberTokenName)->getValue();

        $cookieJar->queue($rememberTokenName, $cookieValue, $time);
    }

    /**
     * Check for valid email
     * @param $email
     * @return bool
     */
    public function checkValidEmail($email)
    {
        $user = $this->find($email, 'email');

        if (!$user) {
            return false;
        }

        return true;
    }

    /**
     * Create Password Reset Token
     * @param $email
     * @return bool
     */
    public function createNewResetToken($email)
    {
        $checkEmail = DB::table('password_resets')
            ->where('email', $email)->exists();

        if (!$checkEmail) {
            return DB::table('password_resets')->insert([
                'email' => $email,
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);
        }

        return DB::table('password_resets')
            ->where('email', $email)->update([
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);
    }

    /**
     * Send Reset Password Email
     * @param $email
     * @return bool
     */
    public function sendResetEmail($email)
    {
        $data = DB::table('password_resets')->where('email', $email)->first();

        $email = $data->email;
        $token = $data->token;

        try {
            $user = $this->find($email, 'email');
            Mail::to($user)->send(new ResetPassword($token));

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Check Reset Password Token is expired or not
     *
     * @param $token
     * @return bool
     * @throws Exception
     */
    public function checkResetToken($token)
    {
        $data = $this->findDataWithToken($token);

        if ($data) {
            $tokenDate = new Carbon($data->created_at);

            if ($tokenDate->addMinutes(60) < now()) {
                return false;
            }

            return true;
        }

        return false;
    }

    /**
     * Get resources with token
     *
     * @param $token
     * @return Model|Builder|object
     */
    public function findDataWithToken($token)
    {
        return DB::table('password_resets')->where('token', $token)->first();
    }

    /**
     * Reset Password
     *
     * @param $token
     * @param $password
     * @return bool
     */
    public function resetPassword($token, $password)
    {
        $data = $this->findDataWithToken($token);

        try {
            $user = $this->find($data->email, 'email');
            $this->update($user->id, ['password' => Hash::make($password)]);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
