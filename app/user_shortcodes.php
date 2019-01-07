<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_shortcodes extends Model
{
  public function shortcode()
    {
        return $this->hasMany('App\Shortcode','fld_int_id');
    }

  public function user(){
    // return $this->hasMany('App\User');
  }
}
