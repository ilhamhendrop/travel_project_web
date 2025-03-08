@extends('master.master_dashboard')

@section('title')
    Detail
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <a href="{{ route('order.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <p>{{ $order->status }}</p>
                        </div>
                        <div class="card-text">
                            <label for="">Nama Pemesan</label>
                            <p>{{ $order->name }}</p>
                        </div>
                        <div class="card-text mt-2">
                            <label for="">Travel</label>
                            <p>
                                Nama Travel: {{ $order->travel->name }} <br>
                                Tanggal Berangkat: {{ $order->travel->date }}
                            </p>
                        </div>
                        <div class="card-text mt-2">
                            <label for="">Pemasanan</label>
                            <p>{{ $order->order }} org</p>
                        </div>
                        <div class="card-text mt-2">
                            <label for="">Pembanyaran</label>
                            <p>Rp {{ $order->total }}</p>
                        </div>
                        <hr class="mt-2 mb-2">
                        <form action="{{ route('order.status', ['order' => $order]) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="{{ $order->status }}" selected>{{ $order->status }}</option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                        </form>
                        @if ($order->status == 'Lunas')
                            <a href="{{ route('order.payment.send', ['order' => $order]) }}" target="_blank"
                                class="btn btn-success mt-2">Send Email</a>
                        @else
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        Bukti Bayar
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/payment/' . $order->payment) }}" class="rounded mx-auto d-block"
                            height="300px" width="300px">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
