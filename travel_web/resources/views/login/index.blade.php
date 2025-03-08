@extends('master.master_login')

@section('title')
    Login
@endsection

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="mt-5 border-0 rounded-lg shadow-lg card">
                    <div class="card-header">
                        <h3 class="my-4 text-center font-weight-light">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                @error('username')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="mt-2 form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @error('password')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="mt-4 mb-0 d-flex align-items-center justify-content-between">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="py-3 text-center card-footer">
                        <div class="small"><a href="{{ route('registrasi.index') }}">Sign up</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
