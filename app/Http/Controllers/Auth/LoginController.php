<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function redirectTo()
    // {
    //     session()->flash('success', 'You are logged in!');
    //     return $this->redirectTo;
    // }

    public function redirectTo()
    {
        $role = Auth::user()->role;
        // dd($role);
        switch ($role) {
            case 'admin':
                session()->flash('success', 'Selamat datang ADMIN!!!');
                return '/admin';
                break;
            case 'st_user':
                session()->flash('success', 'Selamat datang!');
                return '/st_user';
                break;
        }
    }
}
