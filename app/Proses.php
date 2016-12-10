<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{

   protected $table = 'proses';

   protected $fillable = ['id_petugas', 'id_admin', 'id_pemilik', 'id_kejadian' ];

   public $incrementing = false;
   protected $primaryKey = 'id_proses'; // or null



}
