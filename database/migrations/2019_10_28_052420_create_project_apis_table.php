<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_apis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->tinyInteger('api_status')->default(0);
            $table->tinyInteger('summary_status')->default(0);
            $table->tinyInteger('execute_day')->default(1);
            $table->time('execute_at')->default('10:00:00');
            $table->string('url_obj');
            $table->tinyInteger('token')->default(0);
            $table->string('token_url');
            $table->string('replace_obj');
            $table->string('alter_obj');

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
        Schema::dropIfExists('project_apis');
    }
}
