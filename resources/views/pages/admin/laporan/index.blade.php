@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Cetak Laporan Prestasi</h1>
    {{--  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>  --}}

    <!-- DataTales Example -->

    <div class="card shadow">
        <div class="card-body">
            <div class="form-group text-center row">
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
                    <label for="tglawal">Tanggal Awal</label>
                    <input type="date" name="tglawal" id="tglawal" class="form-control">
                </div>
                <div class="col-lg-3">
                    <label for="tglawal">Tanggal Akhir</label>
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                </div>
            </div>
            <div class="text-center">
                <a href="" onclick="this.href='/prestasi/cetak/'+ document.getElementById('tglawal').value +
                '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-success" style="width: 49%">
                    Cetak
                    <i class="fas fa-print"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 mt-3">
        {{--  <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>  --}}
        <div class="card-body">
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
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->prestasi }}</td>
                                <td>{{ $item->penyelenggara }}</td>
                                <td>{{ $item->tingkat }}</td>
                                <td class="text-center">
                                    <a href="{{ route('prestasi.show', $item->id) }}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('prestasi.edit', $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                        title="Edit Data">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('prestasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
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
@endsection
