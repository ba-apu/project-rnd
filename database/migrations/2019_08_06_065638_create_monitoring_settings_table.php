<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('product_owner')->nullable();
            $table->integer('product_owner_email_days')->nullable();

            $table->integer('team_lead')->nullable();
            $table->integer('team_lead_email_days')->nullable();

            $table->integer('cluster_head')->nullable();
            $table->integer('cluster_head_email_days')->nullable();

            $table->integer('management')->nullable();
            $table->integer('management_email_days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_settings');
    }
}
