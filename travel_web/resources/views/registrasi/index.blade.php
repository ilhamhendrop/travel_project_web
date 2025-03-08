@extends('master.master_login')

@section('title')
    Registrasi
@endsection

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="mt-5 border-0 rounded-lg shadow-lg card">
                    <div class="card-header">
                        <h3 class="my-4 text-center font-weight-light">Registrasi</h3>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <form action="{{ route('registrasi.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                @error('username')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @error('email')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @error('password')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Password Konfirmasi</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Password Konfirmasi">
                                @error('password_confirmation')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="mt-4 mb-0 d-flex align-items-center justify-content-between">
                                <button class="btn btn-primary" type="submit">Registrasi</button>
                            </div>
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
