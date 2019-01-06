<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BalanceTransaction;
use App\User;

class BalanceTransactionController extends Controller
{
    public function balanceaccountopen(Request $request)
    {
      $balance = BalanceTransaction::create($request->all());

      return response()->json($balance, 201);
    }


    public function updatebalance(Request $request,BalanceTransaction $balance)
    {

      $amount = $balance->balance_amount;
       $balance->update([
            'transaction_descrption'=>$request->transaction_descrption,
           'balance_amount'=>($amount + $request->balance_amount)
           ]);
       return $balance;
    }

    public function checkbalance($id)
    {
      $user = User::find($id);
      $balance = BalanceTransaction::with('user_balance')->where('user_id',$id)->get();
      if(!$balance){
        return "balance account not available";
      }
      return response()->json($balance,201);
    }

}
