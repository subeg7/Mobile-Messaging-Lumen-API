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
        // var_dump($allMainKeys);
        // false !== $key = array_search($query[1], $allSubKeys)
        if (false !== $mainKey_id = array_search($query[0], $allMainKeys)) {
            // echo $allMainKeys[$mainKey_id]." has id";
            $allSubKeys =pull_sub_keys::where('main_key_id',$mainKey_id)->pluck('name','id')->all();
            // print_r($allSubKeys);
            if (false !== $subKey_id = array_search($query[1], $allSubKeys)) {
              // echo"<br>Both subkeys and main key matched";
              $subKey = pull_sub_keys::find($subKey_id);
              $subKey->count+=1;
              $subKey->save();
              return response([
                  'success_message' => $subKey->sucess_message,
                  'count' =>$subKey->count
              ], 200);
            }else{
              echo"this is syntax failure message";
          }
        }


    }
}
