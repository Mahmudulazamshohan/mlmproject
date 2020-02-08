<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','referral_code','is_blocked'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Upline(){
        return $this->hasOne(Upline::class,'user_id','id');
    }
    public function TotalUpline(){
        return $this->hasOne(TotalUpline::class,'user_id','id');
    }
    public function LevelIncome(){
        return $this->hasOne(LevelIncome::class,'user_id','id');
    }
    public function BusinessStory(){
        return $this->hasOne(BusinessStory::class,'user_id','id');
    }
    public function Profile(){
        return $this->hasOne(Profile::class,'user_id','id');
    }

}
