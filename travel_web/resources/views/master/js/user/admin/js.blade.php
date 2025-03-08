@section('js')
@include('master.js.alert.js')
    <script>
        $('document').ready(function (e) {
            $('#tbAdmin').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user.admin.data') }}',
                columnDefs: [{
                        "targets": [ 0, 1, 2],
                        "className": "text-center",
                    },
                ],
                columns: [
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action', name: 'action' },
                ]
            })
        })
    </script>
@endsection
