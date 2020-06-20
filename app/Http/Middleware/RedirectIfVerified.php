<?php

namespace App\Http\Middleware;

use App\Repositories\User\UserInterface;
use Closure;
use Illuminate\Database\Eloquent\Model;

class RedirectIfVerified
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
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //prevent access to verification page if user is verified.
        $user = $this->user->find($request->id);

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('auth.login')
                ->with('success', 'Your account has been verified before. Login now!');
        }

        return $next($request);
    }
}
