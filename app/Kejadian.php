<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kejadian extends Model
{
   protected $fillable = ['id_kejadian', 'hari', 'tanggal', 'waktu', 'lokasi', 'keterangan']; 
   protected $table = 'Kejadians';
   protected $primaryKey = 'id_kejadian';

}
