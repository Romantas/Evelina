<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('student')->check()) {
            return redirect('/student');
        }
        else if (Auth::guard('company')->check()) {
            return redirect('/company');
        }
        else if(Auth::guard('AM')->check()) {
            return redirect('/AM');
        }

        return $next($request);
    }
}
