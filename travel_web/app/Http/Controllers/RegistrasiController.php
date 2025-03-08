<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegistrasiController extends Controller
{
    public function index_registrasi() {
        return view('registrasi.index');
    }

    public function store_registrasi(Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
        ], [
            'username.required' => 'Tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Tidak boleh kosong',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Tidak boleh kosong',
            'password.confirmed' => 'Password harus sama',
            'password.min' => 'Password minimal 8',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User',
        ]);

        return Redirect::back()->with('succes', 'Registrasi Berhasil');
    }
}
