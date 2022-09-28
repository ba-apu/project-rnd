<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAgricultureExtensionPortals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agriculture_extension_portals', function (Blueprint $table) {
            $table->integer('total')->after('union_id')->nullable();
            $table->integer('fail')->after('total')->nullable();
            $table->integer('success')->after('fail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agriculture_extension_portals', function (Blueprint $table) {
            //
        });
    }
}
