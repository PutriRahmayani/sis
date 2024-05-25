@extends('layouts.admin')

@section('content')
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
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Manajemen Siswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                {{-- <a data-toggle="modal" data-target="#modal-tambah-siswa" class="btn btn-primary mb-3">Tambah Siswa</a> --}}
                @includeIf('pages.siswa.create')
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#modal-show-siswa{{ $item->id }}" class="btn btn-success"><i class='fas fa-eye'></i></a>
                                    {{-- <a data-toggle="modal" data-target="#modal-edit-siswa{{ $item->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a> --}}
                                    <a data-toggle="modal" data-target="#modal-hapus-siswa{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @includeIf('pages.siswa.show', ['item' => $item])
                            {{-- @includeIf('pages.siswa.edit', ['item' => $item]) --}}
                            
                        @empty
                        {{-- handle data empty --}}
                        @endforelse
                    </tbody>
                </table>
                {{-- <a data-toggle="modal" data-target="#modal-cetak-prestasi" class="btn btn-primary mb-3">
                    <i class="fa fa-print d-block"></i>Cetak Data</a> --}}
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Siswa -->
@foreach ($items as $item)
<div class="modal fade" id="modal-hapus-siswa{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda Yakin Ingin Menghapus <b>{{ $item->name }}</b>?</p>
            </div>
            <div class="modal-footer justify-content-center text-center">
                <form action="{{ route('siswa.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-light">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- /.container-fluid -->
@endsection
