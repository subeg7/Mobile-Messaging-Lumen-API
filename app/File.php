<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  public function filecolumns(){
    return $this->hasMany('App\file_columns','file_id');
  }
}
