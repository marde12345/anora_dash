<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public const DEFAULT_PASSWORD = 'anora12345';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except(Auth::id());

        $widget = [
            'title' => 'User',
            'ListUsers' => $users,
        ];

        return view('dashboard.user_index', compact('widget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $widget = [
            'title' => 'User',
        ];
        return view('dashboard.user_create', compact('widget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        // dd($request->all());
        User::create($request->all() + ['password' => self::DEFAULT_PASSWORD]);

        return redirect()->route('dashboard.user.index')
            ->with('success', 'Data berhasil ditambahkan! Password default: ' . self::DEFAULT_PASSWORD);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $widget = [
            'title' => 'User',
            'user' => User::find($id)
        ];
        return view('dashboard.user_show', compact('widget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new UserResource(User::find($id));
        $user = json_decode(json_encode($user));
        $widget = [
            'title' => 'User',
            'user' => $user
        ];

        return view('dashboard.user_edit', compact('widget'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
        ]);

        $data = User::find($id);

        $data->update($request->all());

        return redirect()->route('dashboard.user.index')->with('success', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->role == "admin") {
            return redirect()->route('dashboard.user.index')
                ->with('error', $user->name . ' adalah admin!');
        } else {
            $user->delete();

            return redirect()->route('dashboard.user.index')->with('success', $user->name . ' berhasil dihapus!');
        }
    }
}
