<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Contracts\UserInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserInterface
{
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
        $this->model = $model;
    }

    /**
     * Register
     *
     * @param Array $data
     * @return Response
     */
    public function register($data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->create($data);
    }

    /**
     * Login
     *
     * @param Array $credentials
     * @return Boolean
     */
    public function authenticate($credentials)
    {
        //check if user login by username or email
        $loginBy = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        Auth::attempt([$loginBy => $credentials['username'], 'password' => $credentials['password']]);

        return Auth::check();
    }
}
