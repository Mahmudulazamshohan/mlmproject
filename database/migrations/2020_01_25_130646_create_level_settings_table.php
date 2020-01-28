<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('join_income')->default(3500);
            $table->integer('refferal')->default(500);
            $table->integer('minimum_withdraw')->default(3000);
            $table->integer('withdraw_fee')->default(7);
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
        Schema::dropIfExists('level_settings');
    }
}
