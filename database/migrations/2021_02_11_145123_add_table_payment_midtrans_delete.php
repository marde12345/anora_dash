<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTablePaymentMidtransDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('payment_id');
            $table->string('payment_status')->nullable();
            $table->string('payment_type')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('payment_id');
            $table->removeColumn('payment_status');
            $table->removeColumn('payment_type');
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
