@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Tambah Data Berita</h1>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('berita.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan Judul" value="{{ old('judul') }}" required>
                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" placeholder="Masukkan Isi Berita" required></textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-block my-3">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi');
</script>
@endpush
