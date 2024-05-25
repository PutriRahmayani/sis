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
                                <a data-toggle="modal" data-target="#modal-tambah-siswa" class="btn btn-primary mb-3"><i class="fas fa-plus"></i></a>
                                @includeIf('pages.siswa.create')
                            </div>
                            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='nama'>Nama</label>
                                        <p class="form-control"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='nisn'>NISN</label>
                                        <p class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='gender'>Jenis Kelamin</label>
                                        <p class="form-control"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='email'>Email</label>
                                        <p class="form-control">{{ Auth::user()->email ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='no_hp'>No HP</label>
                                        <p class="form-control"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='alamat'>Alamat</label>
                                        <p class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </section>
@endsection
