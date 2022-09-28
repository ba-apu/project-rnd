<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();

            $table->integer('total_skilled_youth')->nullable();
            $table->integer('total_skilled_youth_received_job')->nullable();
            $table->integer('total_skilled_youth_male')->nullable();
            $table->integer('total_skilled_youth_female')->nullable();
            $table->json('ethnicity')->nullable();
            $table->json('disability')->nullable();
            $table->json('WageorSelf-employed')->nullable();

            $table->integer('total_trainee')->nullable();
            $table->integer('total_trainee_received_job')->nullable();

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
        Schema::dropIfExists('skills');
    }
}
