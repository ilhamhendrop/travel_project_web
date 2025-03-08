<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class HistoryController extends Controller
{
    public function index_history_user() {
        return view('dashboard.history.index');
    }

    public function data_history_user() {
        $user_id = Auth::user()->id;
        $data = Order::join('travel', 'orders.travel_id', '=', 'travel.id')
        ->select(
            'orders.id',
            'orders.name AS name',
            'travel.name AS travel_name',
            'orders.status',
            'orders.date',
        )
        ->where('status', 'Lunas')
        ->where('user_id', $user_id)
        ->get();

        return DataTables::of($data)
        ->addColumn('action', 'master.button.history.action')
        ->make(true);
    }

    public function detail_history_user(Order $order) {
        return view('dashboard.history.detail', compact('order'));
    }

    public function index_history_admin() {
        return view('dashboard.history.admin.index');
    }

    public function data_history_admin() {
        $data = Order::join('travel', 'orders.travel_id', '=', 'travel.id')
        ->select(
            'orders.id',
            'orders.name AS name',
            'travel.name AS travel_name',
            'orders.status',
            'orders.date',
        )
        ->where('status', 'Lunas')
        ->get();

        return DataTables::of($data)
        ->addColumn('action', 'master.button.history.admin.action')
        ->make(true);
    }

    public function detail_history_admin(Order $order) {
        return view('dashboard.history.admin.detail', compact('order'));
    }
}
