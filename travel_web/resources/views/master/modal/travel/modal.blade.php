<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Travel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('travel.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Travel">
                        @error('name')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label>Tujuan</label>
                        <textarea name="description" class="form-control" cols="20" rows="8"></textarea>
                        @error('description')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Tanggal Berangkat</label>
                        <input type="date" name="date" class="form-control" placeholder="Tanggal Beragkat" id="">
                        @error('date')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label>Kuota</label>
                        <input type="number" name="quota" class="form-control" placeholder="Kuota" id="">
                        @error('quota')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Harga</label>
                        <input type="number" name="price" class="form-control" placeholder="Harga" id="">
                        @error('price')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
