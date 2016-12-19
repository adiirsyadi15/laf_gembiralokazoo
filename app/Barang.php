<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{

   protected $table = 'barangs';

   protected $fillable = ['id_kategori', 'nama', 'ciri_ciri' ];

   public $incrementing = false;
   protected $primaryKey = 'id_barang'; // or null

   // 1 barang mempunyai banyak foto
    public function foto() {
        return $this->hasMany('App\Foto', 'id_barang', 'id_barang');
    }
}
