<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store.admin') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        @error('username')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        @error('email')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label>Password Konfirmasi</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="Password Konfirmasi">
                        @error('password_confirmation')
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
