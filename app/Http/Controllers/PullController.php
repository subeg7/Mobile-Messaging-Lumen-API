<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_shortcodes;
use App\Shortcode;

class PullController extends Controller
{
  public function assignshortcode (Request $request){
    //add to user_shortcode table
    $usercode = new user_shortcodes();
    $usercode->fld_user_id = $request->fld_user_id;
    $usercode->fld_shortcode_id = $request->fld_shortcode_id;
    $usercode->assign_type = $request->assign_type;
    $usercode->save();
    return $request;
  }

  public function addKey(Request $request){
      echo"adding key";
  }


  public function viewshortcode($id){
    echo "view the shortcode";
  }

}
