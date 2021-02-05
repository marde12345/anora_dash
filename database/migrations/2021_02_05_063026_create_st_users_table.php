<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('level');
            $table->string('description')->nullable();
            $table->string('tools');
            $table->string('services');
            $table->integer('visitor_count');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('photo_backcover_id')->nullable()->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('photo_backcover_id')->references('id')->on('image_uploadeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('st_users');
    }
}
