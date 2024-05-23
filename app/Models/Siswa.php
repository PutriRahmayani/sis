<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $table = 'siswa';

    protected $fillable = [
       'user_id','nama','nisn','gender','email','no_hp','alamat',
    ];
    
    // public function user()
    // {
    //     return $this->hasOne(User::class, 'id', 'user_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
