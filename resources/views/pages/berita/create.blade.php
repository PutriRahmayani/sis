<div class="modal fade" id="modal-tambah-berita">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <form action="{{ route('berita.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            id="judul" name="judul" placeholder="Masukkan Judul"
                                            value="{{ old('judul') }}" required>
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Isi</label>
                                        <textarea class="ckeditor" name="isi" id="isi_create" cols="30" rows="10"
                                            placeholder="Masukkan Isi Berita" required></textarea>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block my-3">Tambah</button>
                                </form>
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
