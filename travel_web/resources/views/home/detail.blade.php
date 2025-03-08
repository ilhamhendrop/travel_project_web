@extends('master.master_home')

@section('title')
    Detail
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <a href="{{ route('home.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        <h5>{{ $travel->name }}</h5>
                        <p class="card-tetx">
                            {{ $travel->description }} <br>
                            Kuota: {{ $travel->quota }} <br>
                            Tanggal berangkat: {{ $travel->date }} <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        Pesan
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        @include('master.alert.error')
                        <form action="{{ route('order.store', ['travel' => $travel]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama" id="">
                                @error('name')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Jumlah Pemesan</label>
                                <input type="number" name="order" placeholder="Jumlah pesan" class="form-control">
                                @error('order')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            @if (Auth::user())
                                <button class="btn btn-primary mt-2" type="submit">Order</button>
                            @else
                                <button class="btn btn-primary mt-2" type="submit" disabled>Order</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('master.js.alert.js')
@endsection
