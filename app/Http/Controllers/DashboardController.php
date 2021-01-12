<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $TAG = "Dashboard ";

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $users = User::count();

        $widget = [
            'title' => $this->TAG . 'Home',
            'users' => $users,
        ];

        return view('admin/home', compact('widget'));
    }
}
