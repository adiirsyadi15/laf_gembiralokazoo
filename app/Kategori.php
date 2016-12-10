<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
   protected $fillable = ['id_kategori', 'nama', 'keterangan']; 
   protected $table = 'kategoris';
   protected $primaryKey = 'id_kategori';

   
}
