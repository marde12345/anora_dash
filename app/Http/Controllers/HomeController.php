<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget'));
    }

    public function listUsers()
    {
        $users = User::all();

        $widget = [
            'ListUsers' => $users,
        ];

        return view('list_users', compact('widget'));
    }

    public function listUserSts()
    {
        $users_st = User::all();

        $widget = [
            'ListUserSts' => $users_st
        ];

        return view('list_user_sts', compact('widget'));
    }
}
