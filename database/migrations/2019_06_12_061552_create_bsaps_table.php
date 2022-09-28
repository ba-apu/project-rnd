<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBsapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            $table->integer('disvision_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();

            $table->integer('total_active_office')->nullable();
            $table->integer('total_active_service')->nullable();
            $table->integer('total_service_provide')->nullable();
            $table->integer('toal_service_receiver_citizen')->nullable();
            $table->integer('total_pending_servie')->nullable();
            $table->integer('highest_service_providing_list')->nullable();
            $table->integer('lowest_service_providing_list')->nullable();

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
        Schema::dropIfExists('bsaps');
    }
}
