@section('js')
    <script>
        $('document').ready(function (e) {
            $('#tbUser').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user.data') }}',
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
