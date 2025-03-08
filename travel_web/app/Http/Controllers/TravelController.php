<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class TravelController extends Controller
{
    public function index_travel() {
        return view('dashboard.travel.index');
    }

    public function data_travel() {
        $data = Travel::all();

        return DataTables::of($data)
        ->addColumn('action', 'master.button.travel.action')
        ->make(true);
    }

    public function store_travel(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'quota' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'Tidak boleh kosong',
            'description.required' => 'Tidak boleh kosong',
            'date.required' => 'Tidak boleh kosong',
            'quota.required' => 'Tidak boleh kosong',
            'price.required' => 'Tidak boleh kosong',
        ]);

        Travel::create([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'quota' => $request->quota,
            'price' => $request->price,
        ]);

        return Redirect::back()->with('succes', 'Berhasil disimpan');
    }

    public function edit_travel(Travel $travel) {
        return view('dashboard.travel.edit', compact('travel'));
    }

    public function update_travel(Travel $travel, Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'quota' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'Tidak boleh kosong',
            'description.required' => 'Tidak boleh kosong',
            'date.required' => 'Tidak boleh kosong',
            'quota.required' => 'Tidak boleh kosong',
            'price.required' => 'Tidak boleh kosong',
        ]);

        $travel->update([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'quota' => $request->quota,
            'price' => $request->price,
        ]);

        return Redirect::back()->with('succes', 'Data berhasil dirubah');
    }

    public function delete_travel(Travel $travel) {
        $travel->delete();

        return Redirect::back()->with('succes', 'Data berhasil dihapus');
    }
}
