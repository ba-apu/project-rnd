<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeFieldToRsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rsks', function (Blueprint $table) {
            $table->integer('total_register_office')->after('total_active_user')->nullable();
            $table->integer('total_active_office')->after('total_register_office')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rsks', function (Blueprint $table) {
            $table->dropColumn('total_register_office');
            $table->dropColumn('total_active_office');
        });
    }
}
