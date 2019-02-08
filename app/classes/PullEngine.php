<?php

namespace App\classes;


use App\pull_main_key;
use App\pull_sub_keys;
use App\File;
use App\file_columns;
use App\columns_data;

class PullEngine{

  private $file;
  private $fileId;
  private $columns;
  public function GetFileById($dbId){
    // below line returns  files+column+data of that file_id
    $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
    if($fileAsJson!=null)
      return $fileAsJson;
    else return "No file with id ".$dbId;
    // return $file;
  }

  public function LoadFile($dbId){
    $this->fileId = $dbId;

    // below code returns every files+column+data of a user
    $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
    if($fileAsJson!=null)
      $this->file = $fileAsJson;

    else return "No file with id ".$dbId;

  }

  public function GetResult($MOId){
      //first get the column_no of the id file
      $idColumnIndex=file_columns::where('file_id',$this->fileId)->where('name','id')->pluck('sequence_no')[0];
      $cellRowNo=null;

      //sequence_no starts with 1 but array index with 0;
      $idColumnIndex--;

      //get the required rowno of the file
        foreach($this->file['file_columns'][$idColumnIndex]['columns_data'] as $cell){
            if($cellRowNo==null && $cell->data == $MOId ){
              $cellRowNo=$cell->row_no;
              break;
            }
        }

      if($cellRowNo==null) {
        return;
      }
      //create the resultString
      $resutString ="[";
      $columnIndex=0;
      foreach ($this->file['file_columns'] as $cols) {
        $resutString.=$cols->name;
        foreach($this->file['file_columns'][$columnIndex++]['columns_data'] as $cell){
            if($cell->row_no== $cellRowNo){
                $resutString.=":".$cell->data."] [";
            }
        }
      }

      // echo "pull engine:"+$resutString;
      return $resutString;

  }

  public function JsonFileTo2dArray($fileAsJson){

  }
}

?>
