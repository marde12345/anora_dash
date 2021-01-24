<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endorses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inf_id')->nullable()->unsigned();
            $table->bigInteger('cust_id')->nullable()->unsigned();
            $table->bigInteger('plat_id')->nullable()->unsigned();
            $table->integer('days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_coba');
    }
}
