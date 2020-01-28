<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'user_id',
        'account',
        'payment_method',
        'amount',
        'fees',
        'status'
    ];
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
