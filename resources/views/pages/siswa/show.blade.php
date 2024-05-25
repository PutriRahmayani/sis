<div class="modal fade" id="modal-show-siswa{{ $item->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Siswa</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for='nama'>Nama</label>
                                            <p class="form-control">{{ $item->nama }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for='nisn'>NISN</label>
                                            <p class="form-control">{{ $item->nisn }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for='gender'>Jenis Kelamin</label>
                                            <p class="form-control">{{ ucfirst($item->gender) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for='email'>Email</label>
                                            <p class="form-control">{{ $item->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for='no_hp'>No HP</label>
                                            <p class="form-control">{{ $item->no_hp }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for='alamat'>Alamat</label>
                                            <p class="form-control">{{ $item->alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
