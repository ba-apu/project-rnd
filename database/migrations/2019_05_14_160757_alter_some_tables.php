<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drrs', function (Blueprint $table) {
            $table->integer('total_register_office')->after('total_active_user')->nullable();
            $table->integer('total_active_office')->after('total_register_office')->nullable();
        });
        Schema::table('indicators', function (Blueprint $table) {
            $table->json('used_column')->after('is_calculated')->nullable();
        });
        Schema::table('projects',function (Blueprint $table){
            $table->json('display_rule')->after('model_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drrs', function (Blueprint $table) {
            $table->dropColumn('total_register_office');
            $table->dropColumn('total_active_office');
        });
        Schema::table('indicators', function (Blueprint $table) {
            $table->dropColumn('used_column');
        });
        Schema::table('projects',function (Blueprint $table){
            $table->dropColumn('diplay_rule');
        });
    }
}
