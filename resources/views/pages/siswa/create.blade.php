<div class="modal fade" id="modal-tambah-siswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambahkan data siswa -->
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for='name'>Nama</label>
                    <input class='form-control @error('name') is-invalid @enderror' type='text' name='name' id='name' placeholder='Masukkan Nama' value='{{ old('name') }}' />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='nisn'>NISN</label>
                    <input class='form-control @error('nisn') is-invalid @enderror' type='text' name='nisn' id='nisn' placeholder='Masukkan NISN' value='{{ old('nisn') }}' />
                    @error('nisn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='gender'>Jenis Kelamin</label>
                    <input class='form-control @error('gender') is-invalid @enderror' type='text' name='gender' id='gender' placeholder='Masukkan Jenis Kelamin' value='{{ old('gender') }}' />
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='email'>Email</label>
                    <input class='form-control @error('email') is-invalid @enderror' type='email' name='email' id='email' placeholder='Masukkan Email' value='{{ old('email') }}' />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='no_hp'>No HP</label>
                    <input class='form-control @error('no_hp') is-invalid @enderror' type='text' name='no_hp' id='no_hp' placeholder='Masukkan No HP' value='{{ old('no_hp') }}' />
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='alamat'>Alamat</label>
                    <input class='form-control @error('alamat') is-invalid @enderror' type='text' name='alamat' id='alamat' placeholder='Masukkan Alamat' value='{{ old('alamat') }}' />
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for='password'>Password</label>
                    <input class='form-control @error('password') is-invalid @enderror' type='password' name='password' id='password' placeholder='Masukkan Password' value='{{ old('password') }}' />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='password_confirmation'>Konfirmasi Password</label>
                    <input class='form-control @error('password_confirmation') is-invalid @enderror' type='password' name='password_confirmation' id='password_confirmation' placeholder='Masukkan Konfirmasi Password' value='{{ old('password_confirmation') }}' />
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
            </div>               
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>