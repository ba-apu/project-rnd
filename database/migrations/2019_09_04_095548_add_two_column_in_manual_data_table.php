<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnInManualDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manual_data', function (Blueprint $table) {
            $table->tinyInteger('is_view')->default('0')->nullable();
            $table->text('messege')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manual_data', function (Blueprint $table) {
            $table->dropColumn('is_view');
            $table->dropColumn('messege');
        });
    }
}
