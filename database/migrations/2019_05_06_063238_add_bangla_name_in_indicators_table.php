<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBanglaNameInIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicators', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('indicators', function (Blueprint $table) {
            $table->text('name')->after('id')->nullable();
            $table->text('bangla_name')->after('name')->nullable();
            $table->text('rules')->after('bangla_name')->nullable();
            $table->integer('geo_type')->after('rules')->nullable();
            $table->tinyInteger('status')->after('geo_type')->default(1);
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
             $table->dropColumn('name');
             $table->dropColumn('bangla_name');
             $table->dropColumn('rules');
             $table->dropColumn('geo_type');
             $table->dropColumn('status');
        });
        Schema::table('indicators', function (Blueprint $table) {
            $table->text('name')->after('id')->nullable();
        });
        
    }
}
