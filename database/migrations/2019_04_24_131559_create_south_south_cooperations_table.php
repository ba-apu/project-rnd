<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSouthSouthCooperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('south_south_cooperations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->integer('service_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();

            $table->integer('total_tcv_finding_available_in_a2i_website')->nullable();
            $table->integer('total_publication_nationaly')->nullable();
            $table->integer('total_publication_internationaly')->nullable();
            $table->integer('total_bigdata_project')->nullable();
            $table->integer('total_bigdata_project_completed')->nullable();
            $table->integer('total_studies_completed_internal')->nullable();
            $table->integer('total_studies_completed_external')->nullable();
            $table->integer('total_publication_national')->nullable();
            $table->integer('total_publication_international')->nullable();
            $table->integer('publication_type')->nullable();   //hard copy or online copy
            $table->integer('total_result_framework_developed')->nullable();

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
        Schema::dropIfExists('south_south_cooperations');
    }
}
