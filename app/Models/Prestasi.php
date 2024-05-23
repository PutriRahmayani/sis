<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Prestasi extends Model
{
    use HasFactory;

    public $table = 'prestasi';

    // protected $fillable = [
    //    'user_id','nama', 'tanggal', 'prestasi', 'penyelenggara', 'tingkat', 'bukti',
    // ];
    protected $fillable = [
        'user_id', 'nama', 'lomba', 'penyelenggara', 'tanggal', 'tingkat', 'keterangan',  'bukti',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function cetak($id)
    {
        // Ambil data prestasi berdasarkan ID yang dipilih
        $prestasi = Prestasi::findOrFail($id);

        // Logika untuk mencetak data, misalnya menghasilkan PDF
        // $pdf = PDF::loadView('prestasi.cetak', compact('prestasi'));

        // Kembalikan respon PDF
        // return $pdf->stream('laporan-prestasi.pdf');
    }
}
