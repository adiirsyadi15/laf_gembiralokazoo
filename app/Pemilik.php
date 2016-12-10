<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
   protected $fillable = ['username', 'nama','jenis_kelamin','tempat_lahir','tanggal_lahir','alamat', 'pekerjaan','agama', 'no_hp', 'pin_bbm', 'line', 'whatsapp','status_verifikasi','foto_profile' ]; 
   public $incrementing = false;
   protected $talbe = 'pemiliks';
   protected $primaryKey = 'id_pemilik';

   public function usercall() {
        return $this->belongsTo('App\User', 'username', 'username');
    }
}
