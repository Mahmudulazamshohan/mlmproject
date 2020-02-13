<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_approves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('withdraw_id');

            $table->date('achieve_date');
            $table->date('release_date');
            $table->date('payable_by_date');

            $table->foreign('withdraw_id')
                ->references('id')
                ->on('withdraws')
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
        Schema::dropIfExists('loan_approves');
    }
}
