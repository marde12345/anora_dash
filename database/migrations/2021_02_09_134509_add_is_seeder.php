<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsSeeder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('is_seeder');
        });
        Schema::table('proposals', function (Blueprint $table) {
            $table->integer('is_seeder');
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->integer('is_seeder');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->integer('is_seeder');
        });
        Schema::table('done_jobs', function (Blueprint $table) {
            $table->integer('is_seeder');
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
