<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeColumeToNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->char('type')->after('executed')->nullable();
            $table->tinyInteger('button')->after('type')->default('0');
            $table->string('button_value')->after('button')->nullable();
            $table->text('button_link')->after('button_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('button');
            $table->dropColumn('button_value');
            $table->dropColumn('button_link');
        });
    }
}
