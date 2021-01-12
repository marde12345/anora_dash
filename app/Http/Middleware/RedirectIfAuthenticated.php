<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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

    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {
    //         return redirect(RouteServiceProvider::ROOT);
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin' or 'st_user':
                    return redirect('/dashboard');
                    break;
                case 'customer':
                    return redirect('/');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }
        return $next($request);
    }
}
