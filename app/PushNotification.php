<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    protected $fillable = ['text'];
    public function PushNotificationView(){
        return $this->hasOne(PushNotificationView::class,'push_notification_views_id','id');
    }
}
