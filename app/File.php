<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  protected $table = 'file';


  public function file_columns(){
    return $this->hasMany('App\file_columns','file_id');
  }

  // public function columns_data(){
  //   return $this->hasManyThrough(
  //     'App\columns_data',
  //     'App\file_columns',
  //     'file_id', //foreignkey on pull_main_key table
  //     'column_id',//foreignkey on pull_sub_keys
  //     'id', //local key on users table
  //     'id' //local key on main_key table
  //   );
  // }

}
