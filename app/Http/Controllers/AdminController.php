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

    private $TAG = "Admin ";

    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
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
            'title' => $this->TAG . 'Home',
            'users' => $users,
        ];

        return view('admin/home', compact('widget'));
    }

    public function listUsers()
    {
        $users = User::all()->except(Auth::id());;

        $widget = [
            'title' => $this->TAG . 'List User',
            'ListUsers' => $users,
        ];

        return view('admin/list_users', compact('widget'));
    }

    public function generatePerjanjianKerjasama()
    {
        $widget = [
            'title' => $this->TAG . 'Home',
        ];

        $pdf = PDF::loadView('laporan/perjanjian_kerjasama', compact('widget'));
        // return $pdf->download('laporan-pdf.pdf');
        return $pdf->stream();
    }
}
