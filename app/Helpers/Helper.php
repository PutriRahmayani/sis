<?php

namespace App\Helpers;

use App\Models\Prestasi;
use Carbon\Carbon;

class Helper
{
    public function bulanAll()
    {
        return collect([
			[
				'nama_bulan' => 'Januari',
				'kode_bulan' => '01',
			],
			[
				'nama_bulan' => 'Februari',
				'kode_bulan' => '02',
			],
			[
				'nama_bulan' => 'Maret',
				'kode_bulan' => '03',
			],
			[
				'nama_bulan' => 'April',
				'kode_bulan' => '04',
			],
			[
				'nama_bulan' => 'Mei',
				'kode_bulan' => '05',
			],
			[
				'nama_bulan' => 'Juni',
				'kode_bulan' => '06',
			],
			[
				'nama_bulan' => 'Juli',
				'kode_bulan' => '07',
			],
			[
				'nama_bulan' => 'Agustus',
				'kode_bulan' => '08',
			],
			[
				'nama_bulan' => 'September',
				'kode_bulan' => '09',
			],
			[
				'nama_bulan' => 'Oktober',
				'kode_bulan' => '10',
			],
			[
				'nama_bulan' => 'November',
				'kode_bulan' => '11',
			],
			[
				'nama_bulan' => 'Desember',
				'kode_bulan' => '12',
			],
		]);
    }

    public function getTotalPrestasi2018($bulan)
    {
        $item = Prestasi::whereMonth('tanggal', $bulan)->whereYear('tanggal', 2018)->count();

        return $item;
    }

    public function getTotalPrestasi2019($bulan)
    {
        $item = Prestasi::whereMonth('tanggal', $bulan)->whereYear('tanggal', 2019)->count();

        return $item;
    }

    public function getTotalPrestasi2020($bulan)
    {
        $item = Prestasi::whereMonth('tanggal', $bulan)->whereYear('tanggal', 2020)->count();

        return $item;
    }

    public function getTotalPrestasi2021($bulan)
    {
        $item = Prestasi::whereMonth('tanggal', $bulan)->whereYear('tanggal', 2021)->count();

        return $item;
    }

    public function getTotalPrestasi2022($bulan)
    {
        $item = Prestasi::whereMonth('tanggal', $bulan)->whereYear('tanggal', 2022)->count();

        return $item;
    }
}
