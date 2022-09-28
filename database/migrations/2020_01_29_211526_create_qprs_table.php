<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qprs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->nuallable();
            $table->integer('quarter')->nulllable();
            $table->text('challenge');
            $table->text('major_learnings');
            $table->text('collaboration_made');
            $table->text('resource_mobilization');
            $table->text('resource_leveraging');
            $table->text('major_risks');
            $table->text('Potential_collaboration');
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
        Schema::dropIfExists('qprs');
    }
}
