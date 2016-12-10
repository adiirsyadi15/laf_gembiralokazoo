<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role', 'active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // relasi ke tabel petugas
    public function petugascall() {
        return $this->belongsTo('App\Petugas', 'username', 'username');
    }

    public function pemilikscall() {
        return $this->belongsTo('App\Pemilik', 'username', 'username');
    }
}
