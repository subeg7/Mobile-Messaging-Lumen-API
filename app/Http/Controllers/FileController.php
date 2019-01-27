<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Excel;

use Illuminate\Http\Request;
use App\File;
use App\file_columns;
use App\columns_data;

use Exporter;
use Importer;





class FileController extends Controller
{
    private $excel;
    // public static $count;

    public function __construct(Excel $excel){
        // FileController::$count++;
        // echo "After this request, FileController is instatntiated ".FileController::$count." times";
        $this->excel = $excel;
    }

    public function export(){
        return $this->excel->download(new YourExport, 'users.xlsx');
    }

    public function uploaddb(Request $request ,$userId){
      if($request->hasFile('file')){
      $excel = Importer::make('Excel');
      $excel->load($request->file('file')->getRealPath());
      $collection = $excel->getCollection();
      $totalRows = sizeof($collection);
      $totalCols = sizeof($collection[0]);
      // echo"total rows: ".$totalRows." & toal cols: ".$totalCols;


      //create a new file
      $file = new File();
      $file->name = $request->name;
      $file->display_name = $request->name;
      $file->user_id = $userId;
      $file->rows_count = $totalRows;
      $file->columns_count = $totalCols;
      $file->save();

      //store its columns
      $columnNo=1;//tracks column order in input excel file
      foreach($collection[0] as $col){//$collection[0] is always the column name or column header
        $column = new file_columns();
        $column->sequence_no = $columnNo;
        $column->file_id = $file->id;
        $column->name = $col;
        $column->save();
        $rowNo = 1;
        //store this columns respective data
        foreach($collection as $row){
          $data = new columns_data();
          // echo"cell[".++$rowNo."][".$columnNo."]=".$row[$columnNo-1]."<br>";
          $data->column_id = $column->id;
          $data->data =$row[$columnNo-1];//columnNo var started at 1;
          $data->row_no = $rowNo++;
          $data->save();
        }
        $columnNo++;
      }
        return "successfully  stored ".$totalRows." rows & ".$totalCols." columns";
      }else
        return "error no file found";
    }

    public function viewdbofuser($userId){
      $fileAsJson = File::where('user_id',$userId)->get(); //returns only the file details without data
      return view('myFiles')->with('files',$fileAsJson);
      // return $fileAsJson;
    }

    public function viewdbbyid($dbId){
      // below code returns every files+column+data of a user
      $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
      if($fileAsJson!=null)
        return $fileAsJson;
      else return "No file with id ".$dbId;
    }

    public function displayfileintable($dbId){
      $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
      $data =$this->FormatIntoRows($fileAsJson);
      return view('table')->with('data',$data)->with('title',$fileAsJson->name);
    }

    private function FormatIntoRows($json){
      $rows = array(array());
      $currRow=0;
      $currCol =0;
      foreach($json->file_columns as $col){
        foreach($col->columns_data as $data){
          $rows[$currRow++][$currCol]=$data->data;
        }
        $currRow=0;
        $currCol++;
      }
      return $rows;
    }

    public function deletedb($dbId){
      $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
      $fileAsJson->delete();
      return "successfully deleted the db";
    }

    // download


}
