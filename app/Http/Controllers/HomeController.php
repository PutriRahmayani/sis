<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Prestasi::orderBy('tanggal', 'DESC')->get();
        $berita = Berita::paginate(4);
        return view('pages.home', [
            'items' => $items, 'berita' => $berita
        ]);
    }
}
