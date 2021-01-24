<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserPhotoProfileId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->enum('platform', ['facebook', 'instagram', 'tiktok', 'twitter']);
            $table->bigInteger('photo_profile_id')->nullable()->unsigned();

            $table->foreign('photo_profile_id')->references('id')->on('image_uploadeds');
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
