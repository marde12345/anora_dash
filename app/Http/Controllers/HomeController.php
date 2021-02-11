<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use App\Http\Resources\StUserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Contract;
use App\Models\StUser;
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
            StUser::where('level', '>', '80')->inRandomOrder()->limit(10)->get()
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
        $st = StUser::whereNotNull('user_id');
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
        if ($request->city) {
            $city = $request->city;
            $st = $st->whereIn('user_id', function ($query) use ($city) {
                $query->select('id')->from('users')->where('city', $city)->get();
            });
            $get_param_link .= "&city=" . $city;
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
            $get_param_link .= "&isService1=on";
        }
        if ($request->isService2 || $request->services == 'service2') {
            $st = $st->where('services', 'LIKE', '%Olah Data%');
            $get_param_link .= "&isService2=on";
        }
        if ($request->isService3 || $request->services == 'service3') {
            $st = $st->where('services', 'LIKE', '%Data Entry%');
            $get_param_link .= "&isService3=on";
        }
        if ($request->isService4 || $request->services == 'service4') {
            $st = $st->where('services', 'LIKE', '%Pembuatan Kuisioner%');
            $get_param_link .= "&isService4=on";
        }
        if ($request->isService5 || $request->services == 'service5') {
            $st = $st->where('services', 'LIKE', '%Konsultasi Statistik%');
            $get_param_link .= "&isService5=on";
        }
        if ($request->isLevel1) {
            $st = $st->whereBetween('level', [81, 100]);
            $get_param_link .= "&isLevel1=on";
        }
        if ($request->isLevel2) {
            $st = $st->whereBetween('level', [61, 80]);
            $get_param_link .= "&isLevel2=on";
        }
        if ($request->isLevel3) {
            $st = $st->whereBetween('level', [41, 60]);
            $get_param_link .= "&isLevel3=on";
        }
        if ($request->isLevel4) {
            $st = $st->whereBetween('level', [21, 40]);
            $get_param_link .= "&isLevel4=on";
        }
        if ($request->isLevel5) {
            $st = $st->whereBetween('level', [0, 20]);
            $get_param_link .= "&isLevel5=on";
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

    public function contract($barcode)
    {

        // $contract = new ContractResource(Contract::where('barcode', $barcode)->first());
        // $contract = json_decode(json_encode($contract));
        // return $contract;

        $widget = [
            'title' => "Captha",
            'barcode' => $barcode,
        ];

        return view('home.contract_captha', compact('widget'));
    }
    public function contract_captha(Request $request)
    {
        $apa = Contract::where('barcode', $request->barcode)->first();

        if (is_null($apa)) {
            return redirect()->back()
                ->withError("Dokumen tidak ditemukan, pastikan keaslian barcode!");
        }

        $contract = new ContractResource($apa);
        $contract = json_decode(json_encode($contract));
        $widget = [
            'title' => 'Home',
            'contract' => $contract
        ];
        return view('laporan.perjanjian_kerjasama', compact('widget'));
    }

    public function statistisi($name_code)
    {
        $name_code = explode('_', $name_code);
        $st_user = new StUserResource(StUser::find($name_code[0]));
        $st_user = json_decode(json_encode($st_user));
        // dd($st_user);

        $statistisi_terbaik = StUserResource::collection(
            StUser::where('level', '>', '80')->inRandomOrder()->limit(10)->get()
        )->response()->getData();

        $widget = [
            'title' => "Home",
            'st_user' => $st_user,
            'statistisi_terbaik' => $statistisi_terbaik,

        ];

        return view('home.statistisi-portofolio', compact('widget'));
    }
}
