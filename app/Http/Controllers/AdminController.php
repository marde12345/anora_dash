<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
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

        return view('admin/home', compact('widget'));
    }

    public function listUsers()
    {
        $users = User::all()->except(Auth::id());;

        $widget = [
            'ListUsers' => $users,
        ];

        return view('admin/list_users', compact('widget'));
    }

    public function generatePerjanjianKerjasama()
    {
        $data = ['title' => 'Welcome to belajarphp.net'];

        $pdf = PDF::loadView('laporan/perjanjian_kerjasama', $data);
        // return $pdf->download('laporan-pdf.pdf');
        return $pdf->stream();
    }
}
