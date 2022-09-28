<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectTableSegment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->json('first_segment_indicator')->after('teams')->nullable();
            $table->json('second_segment_indicator')->after('first_segment_indicator')->nullable();
            $table->json('third_segment_indicator')->after('second_segment_indicator')->nullable();
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
            $table->dropColumn('first_segment_indicator');
            $table->dropColumn('second_segment_indicator');
            $table->dropColumn('third_segment_indicator');
        });
    }
}
