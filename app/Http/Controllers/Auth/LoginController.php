<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::ROOT;

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
                return '/dashboard';
                break;
            case 'st_user':
                session()->flash('success', 'Selamat datang!');
                return '/dashboard';
                break;
            case 'customer':
                session()->flash('success', 'Selamat datang!');
                return '/';
                break;
            default:
                return '/';
                break;
        }
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();

            $create = User::updateOrCreate(
                [
                    'email' => $user->getEmail()
                ],
                [
                    'socialite_name' => $driver,
                    'socialite_id' => $user->getId(),
                    'photo_url' => $user->getAvatar(),
                    'email_verified_at' => now(),
                ]
                    + $this->splitName($user->getName())
            );

            auth()->login($create, true);

            return redirect($this->redirectPath());
        } catch (\Exception $e) {
            return redirect()->route('root.login');
        }
    }

    public function splitName($full_name)
    {
        $result_name = [];
        $exploded_name = explode(" ", $full_name);
        $exploded_size = count($exploded_name);

        if ($exploded_size) {
            // get lastname and pop it
            $last_name = array_pop($exploded_name);
            $name = join(" ", $exploded_name);
        } else {
            $name = "unamed";
            $last_name = "";
        }

        return [
            "name" => $name,
            "last_name" => $last_name
        ];
    }
}
