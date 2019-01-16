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
    $mainKey->user_enable_status =1;
    $mainKey->reseller_enable_status =0;
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
    return $user->shortcode;//returns all the shortcodes assigned to that user
  }

  public function viewkeylist($id){
    //assume $id as a resller and check it's clients
    $clients = User::where('fld_reseller_id',$id)->pluck('id')->toArray();
    if($clients==null) $clients[0]=$id; //no clients means $id itslef is a client
    $keys = pull_main_key::with('subkeys')->whereIn('user_id',$clients)->get();
    return $keys;
  }

  public function modifykeystatus(Request $request,$userid){
    $statusMessage=array("DISABLED","ENABLED");
    $message = "";
    $key = pull_main_key::find($request->main_key_id);
    $role = User::find($userid)->role()->first();
    // echo"<br> role:".$role->name. " <br>reseller_enable_status: ".$key->reseller_enable_status."<br>" ;

    if($role->name=='reseller'){
      $key->reseller_enable_status=$request->enable_status;
      $message = $role->name." has ".$statusMessage[$request->enable_status]." the selected key=>".$key;
    }else if($role->name=='client' && $key->reseller_enable_status==1 ){
      // echo"point 1";
      $key->user_enable_status=$request->enable_status;//client condition
      $message = $role->name." has ".$statusMessage[$request->enable_status]." the selected key=>".$key;
    }else if($role->name=='client' && $key->reseller_enable_status==0){
      $message = "Disabled by reseller, request reseller to modify";
    }else{
      $message = "Unknown error";
    }

    $key->save();
    return response([
        'status' => $message
    ], 200);
    // return $role->name;
  }
// ->where('main_key_id',$keyid)
  public function deletekey($keyid){

    $key = pull_main_key::with("subkeys")->where('id',$keyid);
    $message = "successfully deleted the key";
    // return $key->get();
    if(sizeof($key->get())==0) $message= "key no longer exits! May be deleted already";
    else $key->delete();
    // return $key;
    return response([
        'status' =>$message
    ], 200);
  }

  public function test(){
    return "working";
  }

  // publ


}
