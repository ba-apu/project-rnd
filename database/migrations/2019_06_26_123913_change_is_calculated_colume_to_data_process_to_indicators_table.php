<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIsCalculatedColumeToDataProcessToIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicators', function (Blueprint $table) {
            $table->dropColumn('is_calculated');
        });
        Schema::table('indicators', function (Blueprint $table) {
            $table->char('data_process',4)->after('priority')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indicators', function (Blueprint $table) {
            Schema::table('indicators', function (Blueprint $table) {
                $table->tinyInteger('is_calculated')->after('priority')->nullable();
            });
            Schema::table('indicators', function (Blueprint $table) {
                $table->dropColumn('data_process');
            });
        });
    }
}
