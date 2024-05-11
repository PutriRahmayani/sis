@extends('layouts.admin')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Prestasi</h1>
    </div>

    <!-- Modal Tambah Data Prestasi -->
    <div class="modal fade" id="modal-tambah-prestasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambahkan data prestasi -->
                    <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama')  is-invalid  @enderror" placeholder="Masukkan Nama Siswa" value="{{ old('nama') }}" required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input type="text" name="prestasi" id="prestasi" class="form-control @error('prestasi')  is-invalid  @enderror" placeholder="Masukkan Prestasi" value="{{ old('prestasi') }}" required>
                            @error('prestasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penyelenggara">Penyelenggara</label>
                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control @error('penyelenggara')  is-invalid  @enderror" placeholder="Masukkan Penyelenggara" value="{{ old('penyelenggara') }}" required>
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
                                <option value="Kota" @if(old('tingkat') == 'Kota') selected @endif>Kota</option>
                                <option value="Provinsi" @if(old('tingkat') == 'Provinsi') selected @endif>Provinsi</option>
                                <option value="Nasional" @if(old('tingkat') == 'Nasional') selected @endif>Nasional</option>
                                <option value="Internasional" @if(old('tingkat') == 'Internasional') selected @endif>Internasional</option>
                                <option value="Sumatera" @if(old('tingkat') == 'Sumatera') selected @endif>Sumatera</option>
                                <option value="Sumbagsel" @if(old('tingkat') == 'Sumbagsel') selected @endif>Sumbagsel</option>
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
                                    <input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                                </div>
                            </div>
                            <label class="small">* Maksimal ukuran pdf 5 MB</label>

                            @error('bukti')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection
