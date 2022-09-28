<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterprenuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprenures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('center_id')->default(0);
            $table->integer('district_id')->default(0);
            $table->integer('upazila_id')->default(0);
            $table->integer('union_id')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('enterprenures');
    }
}
