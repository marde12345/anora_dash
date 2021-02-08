<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status')->nullable();
            $table->enum('type', ['direct', 'open'])->default('open');
            $table->enum('level_need', ['baru', 'entry', 'medium', 'tinggi', 'top'])->nullable();
            $table->string('tool_need')->nullable();
            $table->string('service_need')->nullable();
            $table->string('name_job');
            $table->longText('description');
            $table->string('input_file_url')->nullable();
            $table->unsignedDouble('open_price');
            $table->dateTime('deadline');
            $table->boolean('is_home_service')->default(false);

            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('approval_st_user_id')->nullable()->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approval_st_user_id')->references('id')->on('st_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
