<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('review_description')->nullable();
            $table->integer('star');

            $table->bigInteger('from_user_id')->nullable()->unsigned();
            $table->bigInteger('to_st_user_id')->nullable()->unsigned();
            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_st_user_id')->references('id')->on('st_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
