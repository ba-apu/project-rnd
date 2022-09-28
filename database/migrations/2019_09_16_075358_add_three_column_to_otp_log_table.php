<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThreeColumnToOtpLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('otp_log', function (Blueprint $table) {
            $table->text('details')->nullable()->after('otp_code');
            $table->tinyInteger('send_status')->default('0')->nullable()->after('details');
            $table->tinyInteger('execution_status')->default('0')->nullable()->after('send_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('otp_log', function (Blueprint $table) {
            //
        });
    }
}
