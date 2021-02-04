<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAsdToTableUserUpgradeRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_upgrade_roles', function (Blueprint $table) {
            $table->enum('from_role', ['admin', 'customer', 'st_user']);
            $table->enum('to_role', ['admin', 'customer', 'st_user']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_user_upgrade_roles', function (Blueprint $table) {
            //
        });
    }
}
