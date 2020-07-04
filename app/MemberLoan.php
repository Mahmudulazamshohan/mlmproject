<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberLoan extends Model
{
    protected $fillable = ['user_id',
        'amount',
        'interest',
        'paid',
        'approved',];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
