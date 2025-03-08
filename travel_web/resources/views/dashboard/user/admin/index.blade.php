@extends('master.master_dashboard')

@section('title')
    User
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-plus"></i> Admin
                              </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <div class="table-responsive">
                            <table class="table table-striped" border="1" id="tbAdmin">
                                <thead>
                                    <tr>
                                        <th class="card-title text-center">Username</th>
                                        <th class="card-title text-center">Email</th>
                                        <th class="card-title text-center">Role</th>
                                        <th class="card-title text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('master.modal.user.admin.modal')
@endsection

@include('master.js.user.admin.js')
