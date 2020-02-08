<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberBonus extends Model
{
    protected $fillable = ['user_id','level','bonus'];

    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
