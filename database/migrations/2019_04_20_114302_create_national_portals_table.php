<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNationalPortalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_portals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            //$table->integer('district_id')->nullable();
            //$table->integer('upazila_id')->nullable();
            //s$table->integer('union_id')->nullable();

            $table->bigInteger('total_hit')->nullable();
            $table->integer('total_office')->nullable();
            $table->integer('total_office_update_regularly')->nullable();
            //total_benific
            $table->integer('total_servie_linked_np')->nullable();
            $table->integer('total_e_ervice_lined_np')->nullable();


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
        Schema::dropIfExists('national_portals');
    }
}
