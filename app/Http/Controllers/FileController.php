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



    public function create(Request $request ,$id){

      $excel = Importer::make('Excel');
      $excel->load($request->file('file')->getRealPath());
      $collection = $excel->getCollection();
      echo $collection;


      // echo $request;
      // if($request->file!=null)
      // echo"...................file recieved is:".$request->file;

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
      $fileAsJson = File::with('file_columns.columns_data')->find($id);
      // $fileAsJson->only('name');
      return $fileAsJson;
    }
}
