<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriculturePortalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_portals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->integer('service_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();

            $table->integer('total_crops')->nullable();
            $table->integer('total_blocks')->nullable();
            $table->integer('total_contents')->nullable();
            $table->integer('total_dealer')->nullable();
            $table->integer('total_exhibitions')->nullable();
            $table->integer('total_farmers')->nullable();
            $table->integer('total_huts')->nullable();
            $table->integer('total_material')->nullable();
            $table->integer('total_newspaper')->nullable();
            $table->integer('total_questions')->nullable();
            $table->integer('total_somities')->nullable();
            $table->integer('total_research')->nullable();
            $table->integer('total_users')->nullable();
            $table->integer('total_varieties')->nullable();
            $table->integer('total_videos')->nullable();
            $table->integer('total_variety')->nullable();

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
        Schema::dropIfExists('agriculture_portals');
    }
}
