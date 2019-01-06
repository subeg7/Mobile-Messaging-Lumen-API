<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceTransaction extends Model
{
  protected $table = 'balance_transactions';

  protected $fillable = ['user_id','transaction_type','transaction_descrption',
  'balance_type','balance_amount','balance_after_update'];

  public function user_balance()
  {
    return $this->belongsTo(User::class,'user_id','id');
  }
}
