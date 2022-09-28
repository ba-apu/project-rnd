<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNothisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nothis', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('project_id');
            $table->integer('service_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();

            $table->integer('total_nothi_user')->nullable();
            $table->integer('total_active_nothi_user')->nullable();
            $table->integer('total_service_processed')->nullable();
            $table->integer('total_service_latter')->nullable();
            $table->integer('total_office_use_nothi')->nullable();
            $table->integer('total_active_office_use_nothi')->nullable();
            $table->integer('total_file')->nullable();
            $table->integer('file_received')->nullable();
            $table->integer('file_disposed')->nullable();
            //duration

            $table->json('data')->nullable();
            $table->date('provided_date');
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
        Schema::dropIfExists('nothis');
    }
}
