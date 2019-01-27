<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pull_main_key;
use App\pull_sub_keys;

class VotingController extends Controller
{
    public function ParseVoteQuery(Request $request){
        $query= explode(" ",$request->text);
        $allMainKeys = pull_main_key::pluck('name','id')->all();
        $mainKey_id;
        $mainKey;
        if (false !== $mainKey_id = array_search($query[0], $allMainKeys)) {
          $mainKey = pull_main_key::find($mainKey_id);

            // main key is present but may be disabled by user/reseller
            if($mainKey->user_enable_status && $mainKey->reseller_enable_status){

                $allSubKeys =pull_sub_keys::where('main_key_id',$mainKey_id)->pluck('name','id')->all();
                if (false !== $subKey_id = array_search($query[1], $allSubKeys)) {
                  $subKey = pull_sub_keys::find($subKey_id);
                  $subKey->count+=1;
                  $subKey->save();
                  return response([
                      'message' => $subKey->sucess_message,
                      'count' =>$subKey->count
                  ], 200);
                }else{
                  //subkey not found i.e probably syntax error
                  return response([
                      'message' =>$mainKey->failure_message,
                  ], 400);

              }

        }else{
          //the main key is disabled
          return response([
              'message' => $mainKey->disable_message,
          ], 403);//forbidden
        }
        }else{
          //subkey not found i.e probably syntax error
          return response([
              'message' => "Oops! main key not found"
          ], 400);

        }


    }
}
