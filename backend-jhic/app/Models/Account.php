<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = ['username', 'email', 'password', 'status'];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function ppdbRegister() {
        return $this->hasOne(Register::class, 'account_id');
    }

    // protected static function booted() {
    //     static::creating(function ($account) {
    //         $account->password = bcrypt($account->password);
    //     });
    // }
}