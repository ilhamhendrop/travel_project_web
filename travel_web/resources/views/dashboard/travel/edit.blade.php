@extends('master.master_dashboard')

@section('title')
    Edit
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <a href="{{ route('travel.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <form action="{{ route('travel.update', ['travel' => $travel->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $travel->name }}"
                                    id="">
                                @error('name')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Tujuan</label>
                                <textarea name="description" class="form-control" cols="20" rows="8">{{ $travel->description }}</textarea>
                                @error('description')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Tanggal Berangkat</label>
                                <input type="date" name="date" class="form-control" value="{{ $travel->date }}"
                                    id="">
                                @error('date')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Kuota</label>
                                <input type="number" name="quota" class="form-control" value="{{ $travel->quota }}"
                                    id="">
                                @error('quota')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Harga</label>
                                <input type="number" name="price" class="form-control" value="{{ $travel->price }}"
                                    id="">
                                @error('price')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
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
