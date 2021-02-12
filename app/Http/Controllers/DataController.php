<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function selectKota(Request $request)
    {
        // DB::enableQueryLog();
        $location = $request->q;
        $negaras = User::select('country as location')->where('country', 'LIKE', '%' . $location . '%')->distinct('country');
        $provinsis = User::select('state as location')->where('state', 'LIKE', '%' . $location . '%')->distinct('state');
        $kotas = User::select('city as location')->where('city', 'LIKE', '%' . $location . '%')->distinct('city');

        $kotas = $kotas->union($provinsis);

        if (config('custom.app_env') == 'local') {
            $kotas = $kotas->union($negaras);
        }

        $kotas = $kotas->get();
        // $datas = DB::union($negaras)->union($provinsis)->union($kotas)->get();
        // dd(DB::getQueryLog());
        $datas = json_decode(json_encode($kotas));
        return response()->json($datas);
    }
}
