<?php

namespace App\classes;


use App\pull_main_key;
use App\pull_sub_keys;
use App\File;
use App\file_columns;
use App\columns_data;

class PullEngine{

  private $file;
  private $columns;
  private $result;
  public function GetFileById($dbId){

    // below code returns every files+column+data of a user
    $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
    if($fileAsJson!=null)
      return $fileAsJson;
    else return "No file with id ".$dbId;
    // return $file;
  }

  public function LoadFile($dbId){
    // below code returns every files+column+data of a user
    $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
    if($fileAsJson!=null)
      $this->file = $fileAsJson;
    else return "No file with id ".$dbId;

  }

  public function GetResult($resultSeekingUser){
      $columnIndex =2;
      $cellRowNo=0;

      //get the required rowno of the file
      // foreach ($this->file['file_columns'] as $cols) {
        foreach($this->file['file_columns'][$columnIndex]['columns_data'] as $cell){
            if($cellRowNo==null && $cell->data == $resultSeekingUser ){
              // echo "<br>".$cell->data." has row_no ".$cell->row_no;
              $cellRowNo=$cell->row_no;
              break;
            }
        }
      // }

      if($cellRowNo==0) {
        echo "couldn't find the id you entered";
        return;
      }
      //create the resultString
      $resutString ="";
      $columnIndex=0;
      foreach ($this->file['file_columns'] as $cols) {
        $resutString.=$cols->name;
        foreach($this->file['file_columns'][$columnIndex++]['columns_data'] as $cell){
            if($cell->row_no== $cellRowNo){
                $resutString.=":".$cell->data."||";
            }
        }
      }

      echo $resutString;

  }

  public function JsonFileTo2dArray($fileAsJson){

  }
}

?>
