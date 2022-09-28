<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeFieldToEkShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ek_shops', function (Blueprint $table) {
            //$table->renameColumn('no_of_paprtner','no_of_partner');
            //$table->renameColumn('no_of_order_delivaery','no_of_order_delivery');
            $table->integer('no_of_order_delivery')->after('total_no_of_order')->nullable();
            $table->integer('no_of_partner')->after('no_of_order_delivery')->nullable();
            $table->integer('total_udc_covered')->after('no_of_partner')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ek_shops', function (Blueprint $table) {
            //$table->renameColumn('no_of_partner','no_of_paprtner');
            //$table->renameColumn('no_of_order_delivery','no_of_order_delivaery');
            $table->dropColumn('no_of_partner');
            $table->dropColumn('no_of_order_delivery');
            $table->dropColumn('total_udc_covered');
        });
    }
}
