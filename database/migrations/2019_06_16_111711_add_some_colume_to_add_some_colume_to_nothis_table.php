<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumeToAddSomeColumeToNothisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nothis', function (Blueprint $table) {
            $table->integer('office_id')->after('service_id')->nullable();
            $table->integer('office_ministry_id')->after('office_id')->nullable();
            $table->integer('office_layer_id')->after('office_ministry_id')->nullable();
            $table->integer('nothi_user_female')->after('office_layer_id')->nullable();
            $table->integer('nothi_user_male')->after('nothi_user_female')->nullable();
            $table->integer('active_nothi_user_female')->after('nothi_user_male')->nullable();
            $table->integer('active_nothi_user_male')->after('active_nothi_user_female')->nullable();
            $table->integer('office_is_active')->after('active_nothi_user_male')->nullable();
            $table->integer('nagorik_service')->after('office_is_active')->nullable();
            $table->integer('daptorikh_service')->after('nagorik_service')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nothis', function (Blueprint $table) {
            $table->dropColumn('office_id');
            $table->dropColumn('office_ministry_id');
            $table->dropColumn('office_layer_id');
            $table->dropColumn('nothi_user_female');
            $table->dropColumn('nothi_user_male');
            $table->dropColumn('active_nothi_user_female');
            $table->dropColumn('active_nothi_user_male');
            $table->dropColumn('office_is_active');
            $table->dropColumn('nagorik_service');
            $table->dropColumn('daptorikh_service');
        });
    }
}
