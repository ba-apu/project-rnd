<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEChalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_chalans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('total_transaction')->nullable();
            $table->integer('total_underserved_people')->nullable();
            $table->double('total_transaction_amount')->nullable();
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
        Schema::dropIfExists('e_chalans');
    }
}
