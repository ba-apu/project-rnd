<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorrectColumnNameInTeachersPortalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_portals', function (Blueprint $table) {
            //$table->renameColumn('disvision_id','division_id');
            $table->integer('division_id')->after('project_id')->nullable();
            $table->date('provided_date')->after('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_portals', function (Blueprint $table) {
            //$table->renameColumn('division_id','disvision_id');
            $table->dropColumn('division_id');
            $table->dropColumn('provided_date');
        });
    }
}
