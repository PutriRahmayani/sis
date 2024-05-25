<div class="modal fade" id="modal-edit-prestasi{{ $item->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Prestasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <form action="{{ route('prestasi.update', $item->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama')  is-invalid  @enderror" placeholder="Masukkan Nama"
                                            value="{{ old('nama', $item->nama) }}" >
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                            name="tanggal" placeholder="Masukkan Tanggal" value="{{ old('tanggal', $item->tanggal) }}" required>
                                        @error('tanggal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="lomba">Lomba</label>
                                        <input type="text" name="lomba" id="lomba"
                                            class="form-control @error('lomba')  is-invalid  @enderror" placeholder="Masukkan Lomba"
                                            value="{{ old('lomba', $item->lomba) }}" required>
                                        @error('lomba')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="penyelenggara">Penyelenggara</label>
                                        <input type="text" name="penyelenggara" id="penyelenggara"
                                            class="form-control @error('penyelenggara')  is-invalid  @enderror"
                                            placeholder="Masukkan Penyelenggara" value="{{ old('penyelenggara', $item->penyelenggara) }}" required>
                                        @error('penyelenggara')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tingkat">Tingkat</label>
                                        <select name="tingkat" id="tingkat" class="form-control" required>
                                            <option value="">Pilih Tingkat</option>
                                            <option value="Sekolah" @if (old('tingkat') == 'Sekolah') selected @endif>Sekolah</option>
                                            <option value="Kota" @if (old('tingkat') == 'Kota') selected @endif>Kota</option>
                                            <option value="Provinsi" @if (old('tingkat') == 'Provinsi') selected @endif>Provinsi</option>
                                            <option value="Nasional" @if (old('tingkat') == 'Nasional') selected @endif>Nasional</option>
                                            <option value="Internasional" @if (old('tingkat') == 'Internasional') selected @endif>
                                                Internasional</option>
                                            {{-- <option value="Sumatera" @if (old('tingkat') == 'Sumatera') selected @endif>Sumatera</option>
                                            <option value="Sumbagsel" @if (old('tingkat') == 'Sumbagsel') selected @endif>Sumbagsel  --}}
                                            </option>
                                        </select>
                                        @error('tingkat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bukti">Bukti</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="file" name="bukti" id="bukti"
                                                    class="form-control @error('bukti') is-invalid @enderror">
                                            </div>
                                        </div>
                                        <label class="small">* Maksimal ukuran file 5 MB</label>
                                        <div class="form-group">
                                            <label for="penyelenggara">Keterangan</label>
                                            <input type="text" name="keterangan" id="keterangan"
                                                class="form-control @error('keterangan')  is-invalid  @enderror"
                                                placeholder="Masukkan Keterangan" value="{{ old('keterangan', $item->keterangan) }}" required>
                                            @error('keterangan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
