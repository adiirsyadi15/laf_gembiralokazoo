<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
   protected $fillable = ['id_pemilik', 'jenis_identitas', 'nomor_identitas', 'gambar']; 
   protected $table = 'identitas';
   protected $primaryKey = 'id_identitas';

}
