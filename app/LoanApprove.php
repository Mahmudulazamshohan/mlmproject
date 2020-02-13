<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanApprove extends Model
{
    protected $fillable = [
        'withdraw_id',
        'achieve_date',
        'release_date',
        'payable_by_date'
    ];
}
