<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $prestasi = Prestasi::count();
        $prestasi =  Prestasi::where('status', 'disetujui')->count();
        $guru = Guru::count();
        // $guru =  Guru::where('role', '=', 'GURU')->count();
        // $siswa = User::where('role', '=', 'SISWA')->count();
        $siswa = Siswa::count();
        $selectedYear = $request->input('year', date('Y'));

        $years = Prestasi::select(DB::raw('YEAR(tanggal) as year'))
            ->groupBy('year')
            ->pluck('year');

        $prestasiBulanan = Prestasi::select(
            DB::raw('COUNT(*) as total'),
            DB::raw('MONTH(tanggal) as month')
        )
            ->whereYear('tanggal', $selectedYear)
            ->where('status', 'disetujui')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->all();

        $prestasiPerBulan = array_fill(1, 12, 0);
        foreach ($prestasiBulanan as $month => $total) {
            $prestasiPerBulan[$month] = $total;
        }

        return view('pages.admin.dashboard', compact('prestasi', 'guru', 'siswa', 'prestasiPerBulan', 'years', 'selectedYear'));
    }
}
