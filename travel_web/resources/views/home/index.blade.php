@extends('master.master_home')

@section('title')
    Travel
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            @foreach ($travels as $travel)
                <div class="col-md-4">
                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $travel->name }}</h5>
                            <label class="card-text">Rp {{ $travel->price }}</label>
                            <p class="card-tetx">
                                {{ $travel->description }} <br>
                                Kuota: {{ $travel->quota }} <br>
                                Tanggal berangkat: {{ $travel->date }} <br>
                            </p>
                            @if ($travel->quota == 0)
                                <a href="{{ route('home.detail', ['travel' => $travel]) }}"
                                    class="btn btn-primary" disabled>Pesan</a>
                            @else
                                <a href="{{ route('home.detail', ['travel' => $travel]) }}"
                                    class="btn btn-primary">Pesan</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
