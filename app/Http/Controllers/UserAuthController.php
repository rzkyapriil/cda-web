<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('username', $data['username'])->first();
        if ($user && Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $user->token = Str::uuid()->tostring();
            $user->save();
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->with('errors', 'username atau password salah');
        }
    }

    public function store(UserRegisterRequest $request)
    {
        $data = $request->validated();

        if (user::where('username', $data['username'])->count() == 1) {
            return redirect()->route('home')->with('errors', 'username sudah digunakan');
        }

        $user = new user($data);
        $user->password = Hash::make($data['password']);

        $user->save();

        return redirect()->back()->with('success', 'user berhasil diregistrasi');
    }

    public function logout()
    {
        $user = Auth::user();
        $user->token = null;
        $user->save();

        Session::flush();
        auth::logout();
        return redirect()->route('home');
    }

    public function index()
    {
        $users = DB::table('users')->paginate(10);
        return view('admin.data_users', compact('users'));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $users = DB::table('users')->where('id', $request->id)->first();

        return view('admin.edit_users', compact('user', 'users'));
    }

    public function update(Request $request)
    {
        $users = DB::table('users')->where('id', $request->id);

        if (!isset($request->password)) {
            $users->update([
                'username' => $request->username,
                'name' => $request->name,
            ]);

            return redirect()->route('users.index')->with('success', 'data berhasil diperbaharui');
        }

        $users->update([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password,)
        ]);

        return redirect()->route('users.index')->with('success', 'data berhasil diperbaharui');
    }

    public function destroy(Request $request)
    {
        try {
            $users = DB::table('users')->where('id', $request->id);
            $users->delete();

            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }

    public function search(Request $request)
    {
        $users = DB::table('users')
            ->where('username', 'LIKE', "%$request->cari%")
            ->orWhere('name', 'LIKE', "%$request->cari%")
            ->paginate(10);
        return view('admin.data_users', compact('users'));
    }
}
