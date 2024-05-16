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
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Manajemen Guru</h1>
    {{--  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>  --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{--  <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>  --}}
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                <a data-toggle="modal" data-target="#modal-tambah-guru" class="btn btn-primary mb-3">Tambah Guru</a>
                @includeIf('pages.guru.create')
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIPY</th>
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
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nipy }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="text-center">
                                <a data-toggle="modal" data-target="#modal-show-guru{{ $item->id }}"
                                    class="btn btn-success"><i class='fas fa-eye'></i></a>
                                <a data-toggle="modal" data-target="#modal-edit-guru{{ $item->id }}"
                                    class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                <a data-toggle="modal" data-target="#modal-hapus-guru{{ $item->id }}"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @includeIf('pages.guru.show')
                        @includeIf('pages.guru.edit')
                        @empty
                        {{-- handle data empty --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Hapus Guru -->
@foreach ($items as $item)
<div class="modal fade" id="modal-hapus-guru{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda Yakin Ingin Menghapus <b> {{ $item->name }} </b>?</p>
            </div>
            <div class="modal-footer justify-content-center text-center">
                <form action="{{ route('guru.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-light">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
