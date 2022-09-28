<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEnterprenureColumeNameDigitalCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('digital_centers', function (Blueprint $table) {
            $table->dropColumn('entrepreneur_id');
        });
        Schema::table('digital_centers', function (Blueprint $table) {
            $table->string('entrepreneur_id')->after('provider_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('digital_centers', function (Blueprint $table) {
            $table->dropColumn('entrepreneur_id');
        });
        Schema::table('digital_centers', function (Blueprint $table) {
            $table->integer('entrepreneur_id')->after('provider_id')->nullable();
        });
    }
}
