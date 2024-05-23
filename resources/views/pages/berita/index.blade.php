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
        <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Manajemen Berita</h1>
        {{--  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{--  <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>  --}}
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a data-toggle="modal" data-target="#modal-tambah-berita" class="btn btn-primary mb-3">Tambah Berita</a>
                    @includeIf('pages.berita.create')
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{-- <img src="{{ storage::file-images/$item->thumbnail }}" alt="Thumbnail" style="width: 100px; height: auto;"> --}}
                                        <img src="/images/{{$item->thumbnail }}" alt="Thumbnail" style="width: 100px; height: auto;">
                                    </td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->isi }}</td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-target="#modal-edit-berita{{ $item->id }}"
                                            class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                        <a data-toggle="modal" data-target="#modal-hapus-berita{{ $item->id }}"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    
                                </tr>
                                @includeIf('pages.berita.edit')
                                @includeIf('pages.berita.destroy')
                            @empty
                            {{-- Handle data empty --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            // Iterate over each textarea with class 'ckeditor' and initialize CKEditor
            $('.ckeditor').each(function() {
                CKEDITOR.replace($(this).attr('name'));
            });
        });
    </script>
@endpush
