<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ek_shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            //$table->integer('service_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('total_no_of_order')->nullable();
            $table->integer('no_of_order_delivaery')->nullable();
            $table->integer('no_of_paprtner')->nullable();
            $table->float('total_transaction')->nullable();
            $table->float('total_profit')->nullable();
            $table->integer('total_udc')->nullable();
            $table->integer('no_of_product_deliverd_with_period')->nullable();
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
        Schema::dropIfExists('ek_shops');
    }
}
