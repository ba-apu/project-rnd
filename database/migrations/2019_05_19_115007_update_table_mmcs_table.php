<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableMmcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mmcs', function (Blueprint $table) {
                $table->integer('total_institution_with_functional')->nullable();
                $table->integer('total_primary_school_with_mmc')->nullable();
                $table->integer('total_secondary_school_with_mmc')->nullable();
                $table->integer('total_school_taking_mmc_2')->nullable();
                $table->integer('total_school_connected_mmc_monitoring_system')->nullable();
                $table->integer('total_teacher_capabel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mmcs', function (Blueprint $table) {
            $table->dropColumn('total_institution_with_functional');
            $table->dropColumn('total_primary_school_with_mmc');
            $table->dropColumn('total_secondary_school_with_mmc');
            $table->dropColumn('total_school_taking_mmc_2');
            $table->dropColumn('total_school_connected_mmc_monitoring_system');
            $table->dropColumn('total_teacher_capabel');
        });
    }
}
