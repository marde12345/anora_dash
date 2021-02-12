<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use App\Http\Resources\JobResource;
use App\Http\Resources\StUserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Contract;
use App\Models\Job;
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
        if ($request->isLevel == 'top') {
            $st = $st->whereBetween('level', [81, 100]);
            $get_param_link .= "&isLevel=top";
        }
        if ($request->isLevel == 'tinggi') {
            $st = $st->whereBetween('level', [61, 80]);
            $get_param_link .= "&isLevel=tinggi";
        }
        if ($request->isLevel == 'medium') {
            $st = $st->whereBetween('level', [41, 60]);
            $get_param_link .= "&isLevel=medium";
        }
        if ($request->isLevel == 'entry') {
            $st = $st->whereBetween('level', [21, 40]);
            $get_param_link .= "&isLevel=entry";
        }
        if ($request->isLevel == 'baru') {
            $st = $st->whereBetween('level', [0, 20]);
            $get_param_link .= "&isLevel=baru";
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

    public function browseMap(Request $request)
    {
        // dd($request->lng);
        $longlat = [112.7520883, -7.8574719];
        $is_longlat_default = true;

        if ($request->lng && $request->lat) {
            $lng = $request->lng;
            $lat = $request->lat;
            $is_longlat_default = false;

            $longlat = [$lng, $lat];
            // DB::enableQueryLog();
            $st_users = StUserResource::collection(
                StUser::whereIn('user_id', function ($query) use ($lng, $lat) {
                    $query->select('id')->from('users')
                        ->where('longitude', '>', $lng - 0.3)
                        ->where('longitude', '<', $lng + 0.3)
                        ->where('latitude', '>', $lat - 0.3)
                        ->where('latitude', '<', $lat + 0.3);
                })->get()
            );
            // dd(DB::getQueryLog());
        } elseif ($request->q) {
            $loc = $request->q;

            $user = User::where('city', 'LIKE', '%' . $loc . '%')
                ->orWhere('state', 'LIKE', '%' . $loc . '%');
            if (config('custom.app_env') == 'local') {
                $user = $user->orWhere('country', 'LIKE', '%' . $loc . '%');
                // dd($user);
            }
            $user = $user->first();
            $longlat = [$user->longitude - 0.05, $user->latitude - 0.05];

            $st_users = StUserResource::collection(
                StUser::whereIn('user_id', function ($query) use ($loc) {
                    $query->select('id')->from('users')
                        ->where('city', 'LIKE', '%' . $loc . '%')
                        ->orWhere('state', 'LIKE', '%' . $loc . '%');
                    if (config('custom.app_env') == 'local') {
                        $query = $query->orWhere('country', 'LIKE', '%' . $loc . '%');
                    }
                })->get()
            );
            // dd(DB::getQueryLog());
        } else {
            $st_users = StUserResource::collection(StUser::inRandomOrder()->limit(20)->get());
        }

        $st_users = json_decode(json_encode($st_users));
        // dd($st_users);

        $widget = [
            'title' => "Map",
            'st_users' => $st_users,
            'current_longlat' => [$longlat, $is_longlat_default]
        ];
        return view('home/browse_map', compact('widget'));
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

    public function jobs(Request $request)
    {
        $job = Job::where('type', 'open')->where('status', 'open')->orderBy('created_at', 'desc');
        $get_param_link = '';

        if ($request->isSpss) {
            $job = $job->where('tool_need', 'LIKE', '%SPSS%');
            $get_param_link .= "&isSpss=on";
        }
        if ($request->isPython) {
            $job = $job->where('tool_need', 'LIKE', '%Python%');
            $get_param_link .= "&isPython=on";
        }
        if ($request->isR) {
            $job = $job->where('tool_need', 'LIKE', '%R%');
            $get_param_link .= "&isR=on";
        }
        if ($request->isService1 || $request->services == 'service1') {
            $job = $job->where('service_need', 'LIKE', '%Analisis Regresi%');
            $get_param_link .= "&isService1=on";
        }
        if ($request->isService2 || $request->services == 'service2') {
            $job = $job->where('service_need', 'LIKE', '%Olah Data%');
            $get_param_link .= "&isService2=on";
        }
        if ($request->isService3 || $request->services == 'service3') {
            $job = $job->where('service_need', 'LIKE', '%Data Entry%');
            $get_param_link .= "&isService3=on";
        }
        if ($request->isService4 || $request->services == 'service4') {
            $job = $job->where('service_need', 'LIKE', '%Pembuatan Kuisioner%');
            $get_param_link .= "&isService4=on";
        }
        if ($request->isService5 || $request->services == 'service5') {
            $job = $job->where('service_need', 'LIKE', '%Konsultasi Statistik%');
            $get_param_link .= "&isService5=on";
        }
        if ($request->isLevel == 'top') {
            $job = $job->where('level_need', 'top');
            $get_param_link .= "&isLevel=top";
        }
        if ($request->isLevel == 'tinggi') {
            $job = $job->where('level_need', 'tinggi');
            $get_param_link .= "&isLevel=tinggi";
        }
        if ($request->isLevel == 'medium') {
            $job = $job->where('level_need', 'medium');
            $get_param_link .= "&isLevel=medium";
        }
        if ($request->isLevel == 'entry') {
            $job = $job->where('level_need', 'entry');
            $get_param_link .= "&isLevel=entry";
        }
        if ($request->isLevel == 'baru') {
            $job = $job->where('level_need', 'baru');
            $get_param_link .= "&isLevel=baru";
        }

        $open_jobs = JobResource::collection($job->paginate(10))->response()->getData();

        $len_meta_links = count($open_jobs->meta->links);
        $open_jobs->meta->links[0]->label = "Sebelum";
        $open_jobs->meta->links[$len_meta_links - 1]->label = "Sesudah";

        $widget = [
            'title' => "Cari Pekerjaan",
            'open_jobs' => $open_jobs,
        ];

        return view('home.open_job', compact('widget'));
    }
}
