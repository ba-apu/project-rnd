<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstSecondAndThirdSegmentNameToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('first_segment_name')->after('teams')->nullable();
            $table->string('second_segment_name')->after('first_segment_indicator')->nullable();
            $table->string('third_segment_name')->after('second_segment_indicator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('third_segment_name');
            $table->dropColumn('second_segment_name');
            $table->dropColumn('first_segment_name');
        });
    }
}
