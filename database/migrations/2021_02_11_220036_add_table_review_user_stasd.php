<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableReviewUserStasd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->removeColumn('user_review_id');
            $table->removeColumn('st_user_review_id');
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->bigInteger('user_review_id')->nullable()->unsigned();
            $table->bigInteger('st_user_review_id')->nullable()->unsigned();
            $table->foreign('user_review_id')->references('id')->on('reviews');
            $table->foreign('st_user_review_id')->references('id')->on('reviews');
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
