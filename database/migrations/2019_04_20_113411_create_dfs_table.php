<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dfs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            $table->integer('dfs_type')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('provider_id')->nullable();
            $table->integer('entrepreneur_id')->nullable();
            $table->integer('center_id')->nullable();
            $table->integer('no_of_service_delivery')->nullable();
            $table->integer('service_creator_id');
            $table->integer('service_type_id');
            $table->integer('process_id');
            $table->float('transaction_amount');
            $table->float('profit_amount');
            $table->integer('no_of_service_recipient');
            $table->integer('no_of_male');
            $table->integer('no_of_female');
            $table->json('data')->nullable();
            $table->date('provided_date')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('dfs');
    }
}
