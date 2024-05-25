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
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                            <a data-toggle="modal" data-target="#modal-tambah-profile-siswa" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i>
                            </a>
                            @includeIf('pages.siswa.create_profile')
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for='nama'>Nama</label>
                                    <p class="form-control">{{ $siswa->nama ?? '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for='nisn'>NISN</label>
                                    <p class="form-control">{{ $siswa->nisn ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for='gender'>Jenis Kelamin</label>
                                    <p class="form-control">{{ $siswa->gender ?? '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for='email'>Email</label>
                                    <p class="form-control">{{ $siswa->email ?? Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for='no_hp'>No HP</label>
                                    <p class="form-control">{{ $siswa->no_hp ?? '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for='alamat'>Alamat</label>
                                    <p class="form-control">{{ $siswa->alamat ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </section>
</div>
@endsection
