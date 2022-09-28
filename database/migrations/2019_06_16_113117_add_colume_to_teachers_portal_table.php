<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumeToTeachersPortalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_portals', function (Blueprint $table) {
            $table->integer('primary_schools_covered')->after('primary_schools')->nullable();
            $table->integer('secondary_schools_covered')->after('primary_schools_covered')->nullable();
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
            $table->dropColumn('primary_schools_covered');
            $table->dropColumn('secondary_schools_covered');
        });
    }
}
