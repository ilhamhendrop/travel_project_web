<form action="{{ route('user.delete', ['user' => $model->id]) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-sm show_confirm"
        onclick="return confirm('{{ __('Apakah anda yakin akan menghapus data ini?') }}')"><i class="fa-solid fa-trash"></i>
        {{ __('Delete') }}</button>
</form>
