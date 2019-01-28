<?php

namespace App\classes;


use App\pull_main_key;
use App\pull_sub_keys;
use App\File;
use App\file_columns;
use App\columns_data;

class PullEngine{
  public function GetFileById($dbId){

    // below code returns every files+column+data of a user
    $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
    if($fileAsJson!=null)
      return $fileAsJson;
    else return "No file with id ".$dbId;
    // return $file;
  }

  public function JsonFileTo2dArray($fileAsJson){

  }
}

?>
