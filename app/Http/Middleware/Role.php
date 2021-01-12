<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{

    protected $redirectTo = RouteServiceProvider::ROOT;

    public function handle($request, Closure $next, String $role)
    {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
            return redirect($this->redirectTo);

        $user = Auth::user();
        if ($user->role == $role)
            return $next($request);

        return redirect($this->redirectTo);
    }
}
