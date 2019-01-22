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

    public function __construct(Excel $excel)
    {
        // FileController::$count++;
        // echo "After this request, FileController is instatntiated ".FileController::$count." times";
        $this->excel = $excel;
    }

    public function export()
    {
        return $this->excel->download(new YourExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
      if($request->hasFile('file')){
        echo"file is found";
      $path = $request->file('file')->getRealPath();
      // echo " at ".$path;
      //
      // if(!empty($data) && $data->count()){
      //
      //     foreach ($data->toArray() as $key => $value) {
      //
      //         if(!empty($value)){
      //
      //             foreach ($value as $v) {
      //
      //                 $insert[] = ['title' => $v['title'], 'description' => $v['description']];
      //
      //             }
      //         }
      //     }
      //
      //     if(!empty($insert)){
      //         Item::insert($insert);
      //         return back()->with('success','Insert Record successfully.');
      //     }
      // }
  }

  return back()->with('error','Please Check your file, Something is wrong there.');




      // $this->excel->import(new UsersImport, 'users.xlsx');
      // return redirect('/')->with('success', 'All good!');
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
          $data->data =$row[$columnNo-1];//columnNo started at 1;
          $data->row_no = $rowNo++;
          $data->save();
        }
        $columnNo++;
      }
      return "successfully  stored ".$totalRows." rows & ".$totalCols." columns";
    }else
      return "error no file found";

    }

    public function viewdb($userId){
      // ile_columns.columns_data
      $fileAsJson = File::with('file_columns.columns_data')->where('user_id',$userId)->get();
      // $fileAsJson->only('name');
      return $fileAsJson;
    }

    public function deletedb($dbId){
      $fileAsJson = File::with('file_columns.columns_data')->find($dbId);
      $fileAsJson->delete();
      return "successfully deleted the db";
    }
}
