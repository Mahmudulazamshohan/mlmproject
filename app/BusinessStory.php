<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessStory extends Model
{
    protected $fillable = [
        'user_id',
        'story',
    ];
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
