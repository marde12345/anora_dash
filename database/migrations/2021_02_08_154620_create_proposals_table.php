<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');
            $table->text('answer_job')->nullable();
            $table->unsignedDouble('bid_price');
            $table->mediumText('cover_letter')->nullable();
            $table->string('cv_file')->nullable();

            $table->bigInteger('st_user_id')->nullable()->unsigned();
            $table->bigInteger('job_id')->nullable()->unsigned();

            $table->foreign('st_user_id')->references('id')->on('st_users');
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
