<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pull_main_key extends Model
{
    public function subkeys(){
      return $this->hasMany('App\pull_sub_keys','main_key_id');
    }
}
