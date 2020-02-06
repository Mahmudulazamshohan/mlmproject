<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushNotificationViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_notification_views', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('push_notification_views_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('push_notification_views_id')
                ->references('id')->on('push_notification_views')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('push_notification_views');
    }
}
