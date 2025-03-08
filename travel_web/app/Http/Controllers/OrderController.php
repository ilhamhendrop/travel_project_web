<?php

namespace App\Http\Controllers;

use App\Mail\Sendmail;
use App\Models\Order;
use App\Models\Travel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function store_travel(Travel $travel, Request $request) {
        $request->validate([
            'name' => 'required',
            'order' => 'required',
        ], [
            'name.required' => 'Tidak boleh kosong',
            'order.required' => 'Tidak boleh kosong',
        ]);

        $quota = $travel->quota - $request->order;
        $date = Carbon::now();
        $user_id = Auth::user()->id;

        $travel->update([
            'quota' => $quota,
        ]);

        if ($request->order >= $travel->quota) {
            return Redirect::back()->with('erros', 'Melebihi Kuota');
        } else {
            Order::create([
                'user_id' => $user_id,
                'travel_id' => $travel->id,
                'name' => $request->name,
                'order' => $request->order,
                'status' => 'Belum Lunas',
                'date' => $date
            ]);

            return Redirect::route('order.payment', ['travel' => $travel]);
        }
    }

    public function index_payment(Travel $travel) {
        $user_id = Auth::user()->id;

        $orders = Order::where('travel_id', $travel->id)->where('user_id', $user_id)->get();

        return view('home.payment', compact('orders', 'travel'));
    }

    public function upload_payment(Travel $travel, Order $order, Request $request) {
        $request->validate([
            'payment' => 'required|mimes:png,jpg'
        ]);

        $file = $request->file('payment');
        $path = $order->name . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/payment/' . $path, file_get_contents($file));
        $total = $order->order * $order->travel->price;

        $order->update([
            'payment' => $path,
            'total' => $total,
            'status' => 'Tunggu Verifikasi',
        ]);

        return Redirect::back()->with('succes', 'Upload payment berhasil');
    }

    public function index_order() {
        return view('dashboard.order.index');
    }

    public function data_order() {
        $data = Order::join('travel', 'orders.travel_id', '=', 'travel.id')
        ->select(
            'orders.id',
            'orders.name AS name',
            'travel.name AS travel_name',
            'orders.status',
            'orders.date',
        )
        ->where('status', 'Tunggu Verifikasi')
        ->get();

        return DataTables::of($data)
        ->addColumn('action', 'master.button.order.action')
        ->make(true);
    }

    public function detail_order(Order $order) {
        return view('dashboard.order.detail', compact('order'));
    }

    public function update_status(Order $order, Request $request) {
        $order->update([
            'status' => $request->status
        ]);

        return Redirect::back();
    }

    public function send_payment(Order $order) {
        $name = $order->name;
        $travel_name = $order->travel->name;
        $date = $order->travel->date;
        $order = $order->order;
        $total = $order->total;
        $status = $order->status;

        Mail::to($order->user->email)->send(new Sendmail($name, $travel_name, $date, $order, $total, $status));
    }
}
