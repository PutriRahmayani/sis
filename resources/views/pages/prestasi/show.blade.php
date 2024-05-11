<div class="modal fade" id="modal-show-prestasi{{ $item->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Bukti Prestasi</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <h3 class="text-center" style="color: black">{{ $item->nama }} </h3>
                                <h4 class="text-center" style="color: black">{{ $item->prestasi }} </h4>
                                <embed src="{{ asset('storage/file-images/' . $item->bukti) }}" width="100%"
                                    height="1000" />
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
