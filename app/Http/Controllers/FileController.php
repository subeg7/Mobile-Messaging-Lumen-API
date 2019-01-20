<?php

namespace App\Http\Controllers;

use App\Exports\YourExport;
use App\Imports\YourImport;
use Maatwebsite\Excel\Excel;

use Illuminate\Http\Request;
use App\File;
use App\file_columns;
use App\columns_data;



class FileController extends Controller
{
    private $excel;
    public static $count;

    public function __construct(Excel $excel)
    {
        FileController::$count++;
        // echo "After this request, FileController is instatntiated ".FileController::$count." times";
        $this->excel = $excel;
    }

    public function export()
    {
        return $this->excel->download(new YourExport, 'users.xlsx');
    }

    public function import()
    {
        return $this->excel->import(new YourImport, 'users.xlsx');
    }



    public function create(Request $request ,$id){
      echo $request;
      if($request->file!=null)
      echo"...................file recieved is:".$request->file;

      // Excel::
      // else echo"file is not found";
      //create file
      // $file = new File();
      // $file->name = $request->name;
      // $file->display_name =$request->name;
      // $file->user_id =$request->user_id;
      //create columns

      // create columns_data
    }

    public function viewdb($id){
      $fileAsJson = File::with('file_columns')->with('columns_data')->find($id);
      return $fileAsJson;
    }
}
