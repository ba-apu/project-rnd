<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emutations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('total_service_application')->nullable();
            $table->integer('total_application_reject')->nullable();
            $table->integer('total_service_approve')->nullable();
            $table->integer('total_service_reject')->nullable();
            $table->integer('total_service_office')->nullable();
            $table->integer('total_active_office')->nullable();
            $table->integer('total_user')->nullable();
            $table->double('total_court_fee_amount')->nullable();
            $table->double('total_dcr_amount')->nullable();
            $table->json('data')->nullable();
            $table->date('provided_date')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
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
        Schema::dropIfExists('emutations');
    }
}
