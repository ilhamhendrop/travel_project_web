@section('js')
    @include('master.js.alert.js')
    <script>
        $('document').ready(function (e) {
            $('#tbTravel').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('travel.data') }}',
                columnDefs: [{
                        "targets": [ 0, 1, 2, 3],
                        "className": "text-center",
                    },
                ],
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'quota', name: 'quota' },
                    { data: 'date', name: 'date' },
                    { data: 'price', name: 'price' },
                    { data: 'action', name: 'action' },
                ],
            })
        })
    </script>
@endsection
