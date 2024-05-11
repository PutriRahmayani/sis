<div class="modal fade" id="modal-edit-berita{{ $item->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <form id="quickForm" action="{{ route('berita.update', $item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            id="judul" name="judul" placeholder="Masukkan Judul"
                                            value="{{ $item->judul }}">
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Isi</label>
                                        <textarea class="ckeditor" name="isi" id="isi_edit" cols="30" rows="10"
                                            placeholder="Masukkan Isi Berita">{{ $item->isi }}</textarea>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block my-3">Simpan</button>
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
