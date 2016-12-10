<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   protected $fillable = ['username', 'nama', 'no_hp', 'foto_profile' ]; 
   public $incrementing = false;
   protected $primaryKey = 'id_admin'; // or null

}
