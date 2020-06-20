<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //logout and back to verification page if user is not verified.
        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            $id = Auth::id();

            Auth::logout();

            return redirect()->route('auth.register.verify.index', $id);
        }

        return $next($request);
    }
}
