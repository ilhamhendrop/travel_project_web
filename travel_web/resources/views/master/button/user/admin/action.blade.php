<a href="{{ route('user.edit.data', ['user' => $model->id]) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i> Edit Data</a>
<a href="{{ route('user.edit.password', ['user' => $model->id]) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i> Edit Password</a>
<form action="{{ route('user.delete', ['user' => $model->id]) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-sm show_confirm"
        onclick="return confirm('{{ __('Apakah anda yakin akan menghapus data ini?') }}')"><i class="fa-solid fa-trash"></i>
        {{ __('Delete') }}</button>
</form>
