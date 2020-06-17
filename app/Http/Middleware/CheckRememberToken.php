<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckRememberToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rememberTokenName = Auth::getRecallerName();
        $rememberTokenCookie = Cookie::get($rememberTokenName);

        if (Auth::check() && Auth::user()->remember_token && !$rememberTokenCookie) {

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return $next($request);
        }

        return $next($request);
    }
}
