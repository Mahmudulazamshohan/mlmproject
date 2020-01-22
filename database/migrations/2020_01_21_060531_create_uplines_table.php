<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uplines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('level1')->nullable();
            $table->bigInteger('level2')->nullable();
            $table->bigInteger('level3')->nullable();
            $table->bigInteger('level4')->nullable();
            $table->bigInteger('level5')->nullable();
            $table->bigInteger('level6')->nullable();
            $table->bigInteger('level7')->nullable();
            $table->bigInteger('level8')->nullable();
            $table->bigInteger('level9')->nullable();
            $table->bigInteger('level10')->nullable();
            $table->bigInteger('level11')->nullable();
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
        Schema::dropIfExists('uplines');
    }
}
