@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session()->get('success') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Manajemen Prestasi</h1>
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
                    <a data-toggle="modal" data-target="#modal-tambah-prestasi" class="btn btn-primary mb-3">Tambah
                        Prestasi</a>
                    @includeIf('pages.prestasi.create')
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Lomba</th>
                                <th>Penyelenggara</th>
                                <th>Tingkat</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $item->lomba }}</td>
                                        <td>{{ $item->penyelenggara }}</td>
                                        <td>{{ $item->tingkat }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            @if (Auth::user()->role === 'ADMIN' && $item->status === 'menunggu konfirmasi')
                                                <form action="{{ route('prestasi.updateStatus', $item->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning">
                                                        <span class="badge text-bg-secondary">
                                                            {{ $item->status }}
                                                        </span>
                                                    </button>
                                                </form>
                                            @elseif ($item->status === 'menunggu konfirmasi')
                                                <button type="submit" class="btn btn-warning" disabled>
                                                    <span class="badge text-bg-secondary">
                                                        {{ $item->status }}
                                                    </span>
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-success" disabled>
                                                    <span class="badge text-bg-secondary">
                                                        {{ $item->status }}
                                                    </span>
                                                </button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a data-toggle="modal" data-target="#modal-show-prestasi{{ $item->id }}"
                                                class="btn btn-success"><i class='fas fa-eye'></i></a>
                                            <a data-toggle="modal" data-target="#modal-edit-prestasi{{ $item->id }}"
                                                class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                            <a data-toggle="modal" data-target="#modal-hapus-prestasi{{ $item->id }}"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @includeIf('pages.prestasi.show')
                                    @includeIf('pages.prestasi.edit')
                                    @includeIf('pages.prestasi.destroy')

                            @empty
                                {{-- handle data empty --}}
                            @endforelse

                    </table>
                    <button type="button" class="btn btn-primary m-2" id="cetakButton" data-toggle="modal"
                        data-target="#cetakModal">
                        <i class="fas fa-print"></i> Cetak Data
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cetak -->
    <div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cetak') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
