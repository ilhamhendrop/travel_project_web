@extends('master.master_home')

@section('title')
    Payment
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <h4 class="text-center card-title">Pembanyaran</h4>
                        @foreach ($orders as $order)
                            @php
                                $total = $order->order * $order->travel->price;
                            @endphp
                            <h3 class="card-title text-center mt-2">Rp {{ $total }}</h3>
                        @endforeach
                        <div class="card-text">
                            <label>Transfer</label>
                            <p>BNI: 00909090</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        @include('master.alert.succes')
                        @foreach ($orders as $order)
                            <form action="{{ route('order.payment.upload', ['travel' => $travel, 'order' => $order]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="">Bukti Pembayaran</label>
                                    <input type="file" name="payment" class="form-control" id="">
                                    <button class="btn btn-primary mt-2" type="submit">Upload</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('master.js.alert.js')
@endsection
