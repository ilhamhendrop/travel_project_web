<a href="{{ route('travel.edit', ['travel' => $model->id]) }}" class="btn btn-primary"><i class="fa-solid fa-pen"></i> Edit</a>
<form action="{{ route('travel.delete', ['travel' => $model->id]) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-sm show_confirm"
        onclick="return confirm('{{ __('Apakah anda yakin akan menghapus data ini?') }}')"><i class="fa-solid fa-trash"></i>
        {{ __('Delete') }}</button>
</form>
