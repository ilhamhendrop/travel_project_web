@extends('master.master_dashboard')

@section('title')
    Edit Data
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <a href="{{ route('dashboard.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <form action="{{ route('user.update.data', ['user' => $user->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}" id="">
                                @error('username')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="">
                                @error('email')
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
