<div class="modal fade" id="modal-tambah-profile-siswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (is_null($siswa))
                <form action="{{ route('profile.store') }}" method="POST">
                @else
                <form action="{{ route('profil_siswa.update', $siswa->id) }}" method="POST">
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <label for='nama'>Nama</label>
                    <input class='form-control @error('nama') is-invalid @enderror' type='text' name='nama' id='nama' placeholder='Masukkan Nama' value='{{ $siswa->nama ?? old('nama') }}' />
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='nisn'>NISN</label>
                    <input class='form-control @error('nisn') is-invalid @enderror' type='text' name='nisn' id='nisn' placeholder='Masukkan NISN' value='{{ $siswa->nisn ?? old('nisn') }}' />
                    @error('nisn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Pilih Gender</option>
                        <option value="perempuan" @if (isset($siswa) && $siswa->gender == 'perempuan') selected @endif>Perempuan</option>
                        <option value="laki-laki" @if (isset($siswa) && $siswa->gender == 'laki-laki') selected @endif>Laki-laki</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='email'>Email</label>
                    <input class='form-control @error('email') is-invalid @enderror' type='email' name='email' id='email' placeholder='Masukkan Email' value='{{ $siswa->email ?? old('email') }}' />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='no_hp'>No HP</label>
                    <input class='form-control @error('no_hp') is-invalid @enderror' type='number' name='no_hp' id='no_hp' placeholder='Masukkan No HP' value='{{ $siswa->no_hp ?? old('no_hp') }}' />
                    @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='alamat'>Alamat</label>
                    <input class='form-control @error('alamat') is-invalid @enderror' type='text' name='alamat' id='alamat' placeholder='Masukkan Alamat' value='{{ $siswa->alamat ?? old('alamat') }}' />
                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{ is_null($siswa) ? 'Tambah' : 'Update' }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
