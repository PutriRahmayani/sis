@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Bukti Prestasi</h1>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <h3 class="text-center" style="color: black">{{ $item->nama }} </h3>
            <h4 class="text-center" style="color: black">{{ $item->prestasi }} </h4>
            <form action="{{ route('prestasi.show', $item->id) }}" method="POST" enctype="multipart/form-data">
                <embed src="{{ asset('storage/file-pdf/' . $item->bukti) }}" width="100%" height="1000"/>
            </form>
        </div>
    </div>
</div>
@endsection
