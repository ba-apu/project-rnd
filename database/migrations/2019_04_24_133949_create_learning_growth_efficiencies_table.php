<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningGrowthEfficienciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_growth_efficiencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            /*$table->integer('service_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();*/

            $table->integer('total_employee')->nullable();
            $table->integer('total_employee_growth')->nullable();
            $table->integer('total_learning_time_provided_to_staffs_from_a2i')->nullable();
            $table->integer('total_time_provided_to_staffs_from_a2i')->nullable();


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
        Schema::dropIfExists('learning_growth_efficiencies');
    }
}
