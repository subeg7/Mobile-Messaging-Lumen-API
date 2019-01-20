<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file_columns extends Model
{
  protected $table = 'file_columns';

  public function columns_data(){
    return $this->hasMany('App\columns_data','column_id');
  }
}
