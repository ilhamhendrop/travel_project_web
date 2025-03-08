@section('js')
<script>
    $('document').ready(function (e) {
        $('#tbHistory').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('history.admin.data') }}',
            columnDefs: [{
                        "targets": [ 0, 1, 2, 3],
                        "className": "text-center",
                    },
                ],
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'travel_name', name: 'travel_name' },
                    { data: 'status', name: 'status' },
                    { data: 'date', name: 'date' },
                    { data: 'action', name: 'action' },
                ]
        })
    })
</script>
@endsection
