<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('barcode');
            $table->string('number_contract');
            $table->string('status')->nullable();
            $table->unsignedDouble('price');

            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('st_user_id')->nullable()->unsigned();
            $table->bigInteger('job_id')->nullable()->unsigned();
            $table->bigInteger('payment_id')->nullable()->unsigned();
            $table->bigInteger('done_job_id')->nullable()->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('st_user_id')->references('id')->on('st_users');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('done_job_id')->references('id')->on('done_jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
