<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penemuan extends Model
{
   protected $table = 'penemuans';
   protected $fillable = ['id_barang', 'id_proses','nama_penemu','tanggal_pengambilan', 'status_pengambilan'];
   public $incrementing = false;

   protected $primaryKey = 'id_penemuan'; 

}
