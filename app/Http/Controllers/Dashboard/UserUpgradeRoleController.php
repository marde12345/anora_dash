<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\UserUpgradeRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserUpgradeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_upgrade = UserUpgradeRole::where('from_id', $user_id)->first();

        if (is_null($user_upgrade)) {
            $status_create = UserUpgradeRole::create([
                "from_id" => Auth::user()->id,
                "status" => "review",
            ]);

            if ($status_create) {
                return redirect()->back()
                    ->withSuccess("Pengajuan berhasil, silahkan tunggu akun anda direview!");
            } else {
                return redirect()->back()
                    ->withError("Pengajuan gagal, silahkan coba kembali");
            }
        } elseif ($user_upgrade->status == "review") {
            return redirect()->back()
                ->withStatus("Silahkan tunggu, akun anda sedang direview!");
        } elseif ($user_upgrade->status == "accepted") {
            return redirect()->back()
                ->withSuccess("Selamat, akun anda telah menjadi statistikan");
        } elseif ($user_upgrade->status == "rejected") {
            return redirect()->back()
                ->withError("Akun anda ditolak untuk menjadi statistikan, karena " . $user_upgrade->description);
        } elseif ($user_upgrade->status == "blocked") {
            return redirect()->back()
                ->withError("Akun anda tidak diperbolehkan untuk menjadi statistikan, silahkan hubungi admin!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
