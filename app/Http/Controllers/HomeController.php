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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $statistisi_terbaik = StUserResource::collection(
            St_user::where('level', '>', '80')->inRandomOrder()->limit(10)->get()
        )->response()->getData();
        // dd($statistisi_terbaik);
        // $statistisi_terbaik = json_decode(json_encode($statistisi_terbaik));

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
        $get_param_link = "";

        if ($request->q) {
            $st_user = User::where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->q . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->q . '%');
            })
                ->where('role', 'st_user')
                ->pluck('id')
                ->toArray();

            $st = $st->where(function ($query) use ($request, $st_user) {
                $query->where('tools', 'LIKE', '%' . $request->q . '%')
                    ->orWhere('services', 'LIKE', '%' . $request->q . '%')
                    ->orWhere('level', 'LIKE', '%' . $request->q . '%')
                    ->orWhere('cover_letter', 'LIKE', '%' . $request->q . '%');
                if ($st_user) {
                    $query->orWhereIn('user_id', $st_user);
                }
            });

            $get_param_link .= "&q=" . $request->q;
        }
        if ($request->isSpss) {
            $st = $st->where('tools', 'LIKE', '%SPSS%');
            $get_param_link .= "&isSpss=on";
        }
        if ($request->isPython) {
            $st = $st->where('tools', 'LIKE', '%Python%');
            $get_param_link .= "&isPython=on";
        }
        if ($request->isR) {
            $st = $st->where('tools', 'LIKE', '%R%');
            $get_param_link .= "&isR=on";
        }
        if ($request->isService1 || $request->services == 'service1') {
            $st = $st->where('services', 'LIKE', '%Analisis Regresi%');
            $get_param_link .= "&isisService1=on";
        }
        if ($request->isService2 || $request->services == 'service2') {
            $st = $st->where('services', 'LIKE', '%Olah Data%');
            $get_param_link .= "&isisService2=on";
        }
        if ($request->isService3 || $request->services == 'service3') {
            $st = $st->where('services', 'LIKE', '%Data Entry%');
            $get_param_link .= "&isisService3=on";
        }
        if ($request->isService4 || $request->services == 'service4') {
            $st = $st->where('services', 'LIKE', '%Pembuatan Kuisioner%');
            $get_param_link .= "&isisService4=on";
        }
        if ($request->isService5 || $request->services == 'service5') {
            $st = $st->where('services', 'LIKE', '%Konsultasi Statistik%');
            $get_param_link .= "&isisService5=on";
        }
        if ($request->isLevel1) {
            $st = $st->whereBetween('level', [81, 100]);
            $get_param_link .= "&isisLevel1=on";
        }
        if ($request->isLevel2) {
            $st = $st->whereBetween('level', [61, 80]);
            $get_param_link .= "&isisLevel2=on";
        }
        if ($request->isLevel3) {
            $st = $st->whereBetween('level', [41, 60]);
            $get_param_link .= "&isisLevel3=on";
        }
        if ($request->isLevel4) {
            $st = $st->whereBetween('level', [21, 40]);
            $get_param_link .= "&isisLevel4=on";
        }
        if ($request->isLevel5) {
            $st = $st->whereBetween('level', [0, 20]);
            $get_param_link .= "&isisLevel5=on";
        }

        $st = $st->paginate(15);
        // dd(DB::getQueryLog());
        $statistisis = StUserResource::collection($st)->response()->getData();
        // dd($statistisis);

        $len_meta_links = count($statistisis->meta->links);
        if ($get_param_link) {
            foreach ($statistisis->meta->links as $link) {
                if ($link->url) {
                    $link->url .= $get_param_link;
                }
            }
        }
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
