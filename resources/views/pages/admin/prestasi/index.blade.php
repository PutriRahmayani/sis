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
                    <a href="{{ route('prestasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Prestasi</th>
                                <th>Penyelenggara</th>
                                <th>Tingkat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $item->prestasi }}</td>
                                    <td>{{ $item->penyelenggara }}</td>
                                    <td>{{ $item->tingkat }}</td>
                                    <td>
                                        <a href="{{ route('prestasi.show', $item->id) }}" class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('prestasi.edit', $item->id) }}" class="btn btn-primary mt-2" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('prestasi.destroy', $item->id) }}" method="POST" class="d-inline mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-2">
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

    </div>
<!-- /.container-fluid -->
@endsection
