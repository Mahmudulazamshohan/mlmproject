<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushNotificationView extends Model
{
    protected $fillable = ['push_notification_views_id','user_id'];
   public function PushNotification(){
       return $this->hasOne(PushNotificationView::class,'id','push_notification_views_id');

   }
}
