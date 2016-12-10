<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = ['username', 'nama', 'no_hp', 'foto_profile' ]; 
   public $incrementing = false;
   protected $talbe = 'petugas';
   protected $primaryKey = 'id_petugas';
}
