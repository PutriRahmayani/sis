<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    public $table = 'prestasi';

    protected $fillable = [
       'user_id','nama', 'tanggal', 'prestasi', 'penyelenggara', 'tingkat', 'bukti',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
