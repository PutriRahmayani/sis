<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::count();
        $berita = Berita::count();
        $siswa = User::where('role', '=', 'SISWA')->count();

        return view('pages.admin.dashboard', compact('prestasi', 'berita', 'siswa'));
    }
}
