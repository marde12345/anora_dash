<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserUpgradeRoleResource;
use App\Models\User;
use App\Models\UserUpgradeRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserUpgradeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserUpgradeRoleResource::collection(
        UserUpgradeRole::orderBy('status', 'asc')
                ->get()
        );
        $users = json_decode(json_encode($users));

        // UserUpgradeRole::where('read_at', null)->update(["read_at" => now()]);

        $widget = [
            'title' => 'User Upgrade',
            'ListUsers' => $users,
        ];

        return view('dashboard.userupgraderole_index', compact('widget'));
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
        $user_upgrade = UserUpgradeRole::where('from_id', $user_id)->orderBy('created_at', 'desc')->first();

        $from_role = Auth::user()->role;
        if ($from_role == "admin") {
            return redirect()->back()
                ->withError("Anda sudah memiliki role tertinggi");
        }

        $to_role = User::getUpgradeRoles($from_role);

        if (is_null($user_upgrade)) {
            $status_create = UserUpgradeRole::create([
                "from_id" => Auth::user()->id,
                "status" => "review",
                "from_role" => $from_role,
                "to_role" => $to_role,
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
        } elseif ($user_upgrade->status == "rejected") {
            $status_create = UserUpgradeRole::create([
                "from_id" => Auth::user()->id,
                "status" => "review",
                "from_role" => $from_role,
                "to_role" => $to_role,
            ]);

            if ($status_create) {
                return redirect()->back()
                    ->withError("Permintaan anda sebelumnya ditolak untuk menjadi statistikan, karena " . $user_upgrade->description
                        . ". Pengajuan berhasil dikirim ulang");
            } else {
                return redirect()->back()
                    ->withError("Pengajuan gagal, silahkan coba kembali");
            }
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
        $dataRole = UserUpgradeRole::findOrFail($id);
        $user = User::findOrFail($dataRole->from_id);

        if ($request->action == "accept") {
            if ($user->role == "admin") {
                return redirect()->back()
                    ->withError("Anda sudah memiliki role tertinggi");
            }

            DB::transaction(function () use ($dataRole, $user) {
                try {
                    $dataRole->update([
                        "status" => "accepted",
                        "description" => "Diterima",
                        "action_at" => now()
                    ]);

                    $user->update([
                        'role' => $dataRole->to_role
                    ]);
                } catch (\Throwable $th) {
                    return redirect()->back()->withErrors(['error' => $th->getMessage()]);
                }
            });

            return redirect()->route('dashboard.userupgraderole.index')->with('success', $user->name . ' telah diberikan hak akses sebagai ' . $dataRole->to_role . '!');
        } elseif ($request->action == "tolak") {
            $description = $request->description;

            DB::transaction(function () use ($dataRole, $description) {
                try {
                    $dataRole->update([
                        "status" => "rejected",
                        "description" => $description,
                        "action_at" => now()
                    ]);
                } catch (\Throwable $th) {
                    return redirect()->back()->withErrors(['error' => $th->getMessage()]);
                }
            });

            return redirect()->route('dashboard.userupgraderole.index')->with('status', $user->name . ' tidak diberikan hak akses!');
        } elseif ($request->action == "blok") {
            $description = $request->description;

            DB::transaction(function () use ($dataRole, $description) {
                try {
                    $dataRole->update([
                        "status" => "blocked",
                        "description" => $description,
                        "action_at" => now()
                    ]);
                } catch (\Throwable $th) {
                    return redirect()->back()->withErrors(['error' => $th->getMessage()]);
                }
            });

            return redirect()->route('dashboard.userupgraderole.index')->with('status', $user->name . ' telah diblok!');
        }
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
