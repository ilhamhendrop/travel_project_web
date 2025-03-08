<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index_login() {
        return view('login.index');
    }

    public function login_store(Request $request) {
        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();

            return Redirect::route('dashboard.index');
        }

        return back()->withErrors([
            'username' => 'Username tidak sesuai atau belum terdaftar',
            'password' => 'Password Salah',

        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();

        return Redirect::route('login.index');
    }
}
