@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session()->get('success') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama..." value="{{ $item->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email..." value="{{ $item->email }}">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Masukkan Avatar..." value="{{ $item->avatar }}">
                    <label class="small">* Maksimal ukuran png/jpg 1 MB</label>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password...">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password...">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
