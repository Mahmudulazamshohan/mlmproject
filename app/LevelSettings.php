<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelSettings extends Model
{
    protected $fillable = [
        'join_income',
        'refferal',
        'minimum_withdraw',
        'withdraw_fee'
    ];
}
