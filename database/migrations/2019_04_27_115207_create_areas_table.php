<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('eng_name')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->text('map_path')->nullable();
            $table->string('bbscode')->nullable();
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
        Schema::dropIfExists('areas');
    }
}
