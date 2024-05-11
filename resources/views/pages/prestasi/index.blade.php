@extends('layouts.admin')

@section('content')
@if (Auth::user()->role == 'SISWA')
<!-- Begin Page Content -->
<div class="container-fluid">

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session()->get('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Kelola Prestasi</h1>
    {{--  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>  --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{--  <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>  --}}
        <div class="card-body mt-2">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center" style="color: #37517E">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Prestasi</th>
                            <th>Penyelenggara</th>
                            <th>Tingkat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $prestasi)
                        <tr style="color: #9B9CA9">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $prestasi->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') }}</td>
                            <td>{{ $prestasi->prestasi }}</td>
                            <td>{{ $prestasi->penyelenggara }}</td>
                            <td>{{ $prestasi->tingkat }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#gambarModal{{ $prestasi->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#modalEdit{{ $prestasi->id }}">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <form action="{{ route('prestasi.destroy2', $prestasi->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-body">
            <div class="section-title">
                <h3 class="font-weight-bold">Tambah Prestasi</h3>
            </div>
            <form action="{{ route('prestasi.store2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="prestasi">Prestasi</label>
                        <input type="text" class="form-control @error('prestasi') is-invalid @enderror" id="prestasi"
                            name="prestasi" placeholder="Masukkan Prestasi" value="{{ old('prestasi') }}">
                        @error('prestasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                            id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara"
                            value="{{ old('penyelenggara') }}">
                        @error('penyelenggara')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="tingkat">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="form-control" required>
                            <option value="">Pilih Tingkat</option>
                            <option value="Kota" @if(old('tingkat')=='Kota' ) selected @endif>Kota</option>
                            <option value="Provinsi" @if(old('tingkat')=='Provinsi' ) selected @endif>Provinsi</option>
                            <option value="Nasional" @if(old('tingkat')=='Nasional' ) selected @endif>Nasional</option>
                            <option value="Internasional" @if(old('tingkat')=='Internasional' ) selected @endif>
                                Internasional</option>
                        </select>
                        @error('tingkat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                            name="tanggal" placeholder="Masukkan Tanggal" value="{{ old('tanggal') }}">
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="bukti">Bukti</label>
                        <input type="file" name="bukti" id="bukti"
                            class="form-control @error('bukti') is-invalid @enderror">
                        @error('bukti')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary w-25" type="submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($items as $item2)
<div class="modal fade" id="modalEdit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('prestasi.update2', $item2->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Masukkan Nama" value="{{ $item2->nama }}" readonly>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="prestasi">Prestasi</label>
                            <input type="text" class="form-control @error('prestasi') is-invalid @enderror"
                                id="prestasi" name="prestasi" placeholder="Masukkan Prestasi"
                                value="{{ $item2->prestasi }}">
                            @error('prestasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara"
                                value="{{ $item2->penyelenggara }}">
                            @error('penyelenggara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="tingkat">Tingkat</label>
                            <select name="tingkat" id="tingkat" class="form-control">
                                <option value="">Pilih Tingkat</option>
                                <option value="Kota" @if($item2->tingkat == 'Kota') selected @endif>Kota</option>
                                <option value="Provinsi" @if($item2->tingkat == 'Provinsi') selected @endif>Provinsi
                                </option>
                                <option value="Nasional" @if($item2->tingkat == 'Nasional') selected @endif>Nasional
                                </option>
                                <option value="Internasional" @if($item2->tingkat) == 'Internasional') selected
                                    @endif>Internasional</option>
                            </select>
                            @error('tingkat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal" placeholder="Masukkan Tanggal"
                                value="{{ $item2->tanggal }}">
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="bukti">Bukti</label>
                            <input type="file" name="bukti" id="bukti"
                                class="form-control @error('bukti') is-invalid @enderror">
                            @error('bukti')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary w-25" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($items as $item3)
<div class="modal fade" id="gambarModal{{ $item3->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center mb-5">
                <h3 class="text-center" style="color: black">{{ $item3->nama }} </h3>
                <embed src="{{ asset('storage/file-pdf/' . $item3->bukti) }}" width="100%" height="1000" />
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- /.container-fluid -->
@else
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="text-danger">Anda tidak memiliki akses untuk melihat tampilan ini</h4>
        </div>
    </div>
</div>
@endif
@endsection
