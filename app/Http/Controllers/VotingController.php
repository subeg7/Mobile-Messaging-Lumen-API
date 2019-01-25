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
        // print_r($allMainKeys);
        if ($index=in_array($query[0],$allMainKeys)) {
          //mainkey is valid
          // echo "index:".$index;
          // echo $allMainKeys[0];
            $allSubKeys =pull_sub_keys::where('main_key_id',$index)->pluck('name')->all();
            // print_r($allSubKeys);
            if ($index=in_array($query[1],$allSubKeys)) {
            //     echo"Both subkeys";
          }else{
            echo"this is syntax failure message";
          }
        }


    }
}
