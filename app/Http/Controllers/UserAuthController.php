<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();

        if (user::where('username', $data['username'])->count() == 1) {
            return redirect()->route('home')->with('errors', 'username sudah digunakan');
        }

        $user = new user($data);
        $user->password = Hash::make($data['password']);
        $user->assignRole('user');

        $user->save();

        return redirect()->route('home')->with('success', 'user berhasil diregistrasi');
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
}
