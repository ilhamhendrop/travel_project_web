<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index_admin() {
        return view('dashboard.user.admin.index');
    }

    public function index_user() {
        return view('dashboard.user.index');
    }

    public function data_admin() {
        $data = User::where('role', 'Admin')->get();

        return DataTables::of($data)
        ->addColumn('action', 'master.button.user.admin.action')
        ->make(true);
    }

    public function data_user() {
        $data = User::where('role', 'User')->get();

        return DataTables::of($data)
        ->addColumn('action', 'master.button.user.action')
        ->make(true);
    }

    public function store_admin(Request $request) {
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
            'role' => 'Admin',
        ]);

        return Redirect::back()->with('succes', 'Data berhasil disimpan');
    }

    public function edit_data(User $user) {

        return view('dashboard.user.edit.edit_data', compact('user'));
    }

    public function edit_password(User $user) {
        return view('dashboard.user.edit.edit_password', compact('user'));
    }

    public function update_data(User $user, Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return Redirect::back()->with('succes', 'Berhasil dirubah');
    }

    public function update_password(User $user, Request $request) {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ], [
            'password.required' => 'Tidak boleh kosong',
            'password.confirmed' => 'Password harus sama',
            'password.min' => 'Password minimal 8',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return Redirect::back()->with('succes', 'Password berhasil dirubah');
    }

    public function delete($user) {
        $user->delete();

        return Redirect::back()->with('succes', 'Data berhasil dihapus');
    }

    public function profile($username) {
        $users = User::where('username', $username)->get();

        return view('dashboard.user.profile.index', compact('users'));
    }
}
