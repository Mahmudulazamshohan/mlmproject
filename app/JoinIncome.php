<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinIncome extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
    ];
}
