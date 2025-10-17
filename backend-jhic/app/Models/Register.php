<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'account_id',
        'nama_siswa',
        'jurusan',
        'nama_walmur',
        'nohp_walmur',
        'nik',
        'alamat',
    ];

    public function account() {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
