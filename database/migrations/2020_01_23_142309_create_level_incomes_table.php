<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('level1')->default(0);
            $table->bigInteger('level2')->default(0);
            $table->bigInteger('level3')->default(0);
            $table->bigInteger('level4')->default(0);
            $table->bigInteger('level5')->default(0);
            $table->bigInteger('level6')->default(0);
            $table->bigInteger('level7')->default(0);
            $table->bigInteger('level8')->default(0);
            $table->bigInteger('level9')->default(0);
            $table->bigInteger('level10')->default(0);
            $table->bigInteger('level11')->default(0);
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
        Schema::dropIfExists('level_incomes');
    }
}
