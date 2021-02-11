<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function selectKota(Request $request)
    {
        $kota = $request->q;
        $kotas = User::select('city')->where('city', 'LIKE', '%' . $kota . '%')->distinct('city')->get();
        $kotas = json_decode(json_encode($kotas));
        return response()->json($kotas);
    }
}
