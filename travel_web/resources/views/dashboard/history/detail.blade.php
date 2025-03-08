@extends('master.master_dashboard')

@section('title')
    Detail
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <a href="{{ route('history.user.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
