<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_shortcodes;
use App\Shortcode;
use App\User;
use App\pull_categories;
use App\pull_main_key;
use App\pull_sub_keys;

class PullController extends Controller
{
  public function assignshortcode (Request $request){
    //add to user_shortcode table
    $usercode = new user_shortcodes();
    $usercode->fld_user_id = $request->fld_user_id;
    $usercode->fld_shortcode_id = $request->fld_shortcode_id;
    $usercode->assign_type = $request->assign_type;
    $usercode->save();
    return "successfully assigned the shortcode to the user";
  }

  public function addKey(Request $request){
    //add to the pull_main_key and pull_sub_keys table
    $mainKey = new pull_main_key();
    $mainKey->name= $request->main_key['name'];
    $mainKey->user_id= $request->main_key['user_id'];
    $mainKey->shortcode_id= $request->main_key['shortcode_id'];
    $mainKey->disable_message= $request->main_key['disable_message'];
    $mainKey->failure_message= $request->main_key['failure_message'];
    $mainKey->save();

    //add the subkeys of the mainkeys
    foreach($request->sub_keys as $sub_key){
      $subKey = new pull_sub_keys();
      $subKey->main_key_id=$mainKey->id;
      $subKey->name=$sub_key['name'];
      $subKey->sucess_message=$sub_key['sucess_message'];
      $subKey->message_template_id=$sub_key['template_id'];
      $subKey->address_book_id=$sub_key['address_book_id'];
      $subKey->save();
      $subKey=null;
    }
    return "keys successfully added";
  }


  public function viewshortcodes($id){
      $user = User::find($id);
      $shortcodes = $user->shortcode;
      foreach($shortcodes as $code){
          echo"<br>[name]:".$code->fld_chr_name."| [code]:".$code->assign_to;
      }
      // return $user->shortcode;
  }



}
