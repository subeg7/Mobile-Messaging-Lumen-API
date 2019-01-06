<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendSms;
use App\BalanceTransaction;
use App\User;
use Mail;
use Illuminate\Mail\Message;

class SendSmsController extends Controller
{
  public function sendSms(Request $request)
  {
      //$sendsms = new SendSms;
      $senderid_id = $request->input('senderid_id');
      $contactlist_id = $request->input('contactlist_id');
      $contactnumbers_id = $request->input('contactnumbers_id');
      $number = $request->input('number');
      $body = $request->input('body');
      $sendsms = SendSms::create(['senderid_id' => $senderid_id, 'number' => $number, 'body'=> $body,'contactlist_id'=>$contactlist_id]);
      //$sendername = $senderid_id->senderId()->senderid->get();
      //$sendername = SendSms::with('senderId')->where(,$senderid_id);
      //dd($sendsms);
      //$senderid = SenderId::with('operators')->with('users')->get();
     // $contactnumbers = ContactList::with('contactnumber')->where('contactlist_id',$contactlist_id);
      $sendsms = SendSms::with('senderId')->with('contactlists')->with('contactnumbers')->where('senderid_id',$senderid_id)->where('contactlist_id',$contactlist_id)->first();
      return response()->json($sendsms,201);
      $sendername = SendSms::with('senderId')->where('senderid',$senderid_id)->first();
      dd($sendername);

    /*  Mail::send('emails.send', ['senderid_id' => $senderid_id, 'number' => $number , 'body' => $body],
      function($message) use ($number,$senderid_id){
          $message->from('me@gmail.com');
          $message->to($number);
        });

     */

  }

    public function sms_service(Request $request,$id)
    {
        $user = User::find($id);
        $balance = BalanceTransaction::with('user_balance')->where('user_id',$id)->first();
        if(!$balance){
          return "balance account not available";
        }
        if($balance->balance_amount < 10)
        {
          return "not enough balance";
        }
        $number = $request->input('number');
        $senderid_id = $request->input('senderid_id');
        $body = $request->input('body');
        $sms = SendSms::create(['senderid_id' => $senderid_id, 'number' => $number, 'body'=> $body])->with('senderId')->latest()->first();
        $newbalance = ($balance->balance_amount - 10);
        $balance->update([
            'balance_amount'=>$newbalance
            ]);
        return response()->json($sms,201);


    }
}
