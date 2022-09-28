<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManualDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->integer('indicator_id');
            $table->date('date')->nullable();
            $table->double('data_value')->nullable();
            $table->double('target_value')->nullable();
            $table->tinyInteger('is_authorized')->default(0);

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('authorized_by')->nullable();
            
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
        Schema::dropIfExists('manual_data');
    }
}
