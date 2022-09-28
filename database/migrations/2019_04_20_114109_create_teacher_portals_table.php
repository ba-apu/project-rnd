<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherPortalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_portals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            //$table->integer('service_id')->nullable();
            $table->integer('disvision_id');
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('total_register_user')->nullable();
            $table->integer('total_active_user')->nullable();
            $table->integer('total_active_user_rural')->nullable();
            $table->integer('total_active_user_urban')->nullable();
            $table->integer('total_content')->nullable();
            $table->integer('total_content_in_rural')->nullable();
            $table->integer('total_content_in_urban')->nullable();
            $table->integer('total_content_by_teacher')->nullable();
            $table->integer('total_inovation_content')->nullable();
            $table->integer('total_model_content_by_teacher')->nullable();
            $table->integer('total_school')->nullable();
            $table->integer('type')->nullable();
            $table->integer('total_school_in_rural')->nullable();
            $table->integer('total_school_in_urban')->nullable();
            $table->integer('total_blogger_user')->nullable();
            $table->integer('total_active_user_weekly_hit')->nullable();

            $table->json('data')->nullable();
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
        Schema::dropIfExists('teacher_portals');
    }
}
