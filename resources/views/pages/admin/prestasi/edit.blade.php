@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Edit Data Prestasi</h1>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('prestasi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama')  is-invalid  @enderror" value="{{ $item->nama }}" placeholder="Masukkan Nama Siswa">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{ $item->tanggal }}">
                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prestasi">Prestasi</label>
                        <input type="text" name="prestasi" id="prestasi" class="form-control @error('prestasi')  is-invalid  @enderror" placeholder="Masukkan Prestasi" value="{{ $item->prestasi }}">
                        @error('prestasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input type="text" name="penyelenggara" id="penyelenggara" class="form-control @error('penyelenggara')  is-invalid  @enderror" placeholder="Masukkan Penyelenggara" value="{{ $item->penyelenggara }}">
                        @error('penyelenggara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tingkat">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="form-control">
                            <option value="">Pilih Tingkat</option>
                            <option value="Kota" @if($item->tingkat == 'Kota') selected @endif>Kota</option>
                            <option value="Provinsi" @if($item->tingkat == 'Provinsi') selected @endif>Provinsi</option>
                            <option value="Nasional" @if($item->tingkat == 'Nasional') selected @endif>Nasional</option>
                            <option value="Internasional" @if($item->tingkat == 'Internasional') selected @endif>Internasional</option>
                            <option value="Sumatera" @if($item->tingkat == 'Sumatera') selected @endif>Sumatera</option>
                            <option value="Sumbagsel" @if($item->tingkat == 'Sumbagsel') selected @endif>Sumbagsel</option>
                        </select>
                        @error('tingkat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti</label>
                        <input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                        <label class="small">* Maksimal ukuran pdf 5 MB</label>

                        @error('bukti')
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
@endsection
