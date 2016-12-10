<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{

   protected $table = 'fotos';

   protected $fillable = ['id_barang', 'nama'];

   // public $incrementing = false;
   protected $primaryKey = 'id_foto'; // or null



}
