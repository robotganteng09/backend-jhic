<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'nama_siswa',
        'jurusan',
        'nama_walmur',
        'nohp_walmur',
        'nik',
        'alamat'
    ];
}
