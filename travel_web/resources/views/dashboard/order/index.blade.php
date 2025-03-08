@extends('master.master_dashboard')

@section('title')
    Order
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" border="1" id="tbOrder">
                                <thead>
                                    <tr>
                                        <th class="card-title text-center">Nama</th>
                                        <th class="card-title text-center">Travel</th>
                                        <th class="card-title text-center">Status</th>
                                        <th class="card-title text-center">Tanggal Order</th>
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
@endsection

@include('master.js.order.js')
