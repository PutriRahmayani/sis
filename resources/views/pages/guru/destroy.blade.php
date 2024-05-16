{{-- <!-- /.Modal Hapus Guru -->
<div class="modal fade" id="modal-hapus-guru{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda Yakin Ingin Menghapus <b> {{ $item->name }} </b>?</p>
            </div>
            <div class="modal-footer justify-content-center text-center">
                <form action="{{ route('guru.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-light">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}