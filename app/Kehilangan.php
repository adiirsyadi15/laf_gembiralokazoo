<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehilangan extends Model
{

   protected $table = 'kehilangans';

   protected $fillable = ['id_barang', 'id_proses', 'status_kehilangan'];

   // public $incrementing = false;
   protected $primaryKey = 'id_kehilangan'; // or null



}
