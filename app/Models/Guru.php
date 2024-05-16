<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    public $table = 'guru';

    protected $fillable = [
       'user_id','nama','nipy','jenis_kelamin','email','no_hp','alamat',
    ];
 
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
