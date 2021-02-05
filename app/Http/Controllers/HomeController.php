<?php

namespace App\Http\Controllers;

use App\Http\Resources\StUserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\St_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $statistisi_terbaik = UserResource::collection(User::where('role', 'st_user')->inRandomOrder()->limit(10)->get());
        $statistisi_terbaik = json_decode(json_encode($statistisi_terbaik));

        $widget = [
            'title' => "Home",
            'statistisi_terbaik' => $statistisi_terbaik,
        ];

        return view('home.home', compact('widget'));
    }

    public function browse(Request $request)
    {
        // DB::enableQueryLog();
        $st = St_user::whereNotNull('user_id');
        // dd($st);

        if ($request->isSpss) {
            $st = $st->where('tools', 'like', '%SPSS%');
        }

        $st = $st->paginate(15);
        // dd(DB::getQueryLog());
        $statistisis = StUserResource::collection($st)->response()->getData();
        // dd($statistisis);

        $len_meta_links = count($statistisis->meta->links);
        $statistisis->meta->links[0]->label = "Sebelum";
        $statistisis->meta->links[$len_meta_links - 1]->label = "Sesudah";

        $widget = [
            'title' => "Cari Statistisi",
            'statistisis' => $statistisis,
        ];

        return view('home.browse', compact('widget'));
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
