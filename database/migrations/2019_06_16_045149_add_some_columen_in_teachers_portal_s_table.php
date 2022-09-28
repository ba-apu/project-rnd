<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumenInTeachersPortalSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_portals', function (Blueprint $table) {
            $table->integer('teachers_in_tp')->after('data')->nullable();
            $table->integer('active_teachers_in_tp')->after('data')->nullable();
            $table->integer('teachers_uploaded_contents')->after('data')->nullable();
            $table->integer('teachers_in_tp_from_Urban')->after('data')->nullable();
            $table->integer('schools_covered_by_tp_rural')->after('data')->nullable();
            $table->integer('schools_covered_by_tp_urban')->after('data')->nullable();
            $table->integer('primary_schools')->after('data')->nullable();
            $table->integer('higher_secondary_schools')->after('data')->nullable();
            $table->integer('active_blog_teachers')->after('data')->nullable();
            $table->integer('active_users')->after('data')->nullable();
            $table->integer('uploaded_by_teachers_innovation_stories')->after('data')->nullable();
            $table->integer('uploaded_by_teachers_model')->after('data')->nullable();
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
            $table->dropColumn('teachers_in_tp');
            $table->dropColumn('active_teachers_in_tp');
            $table->dropColumn('teachers_uploaded_contents');
            $table->dropColumn('teachers_in_tp_from_Urban');
            $table->dropColumn('schools_covered_by_tp_rural');
            $table->dropColumn('schools_covered_by_tp_urban');
            $table->dropColumn('primary_schools');
            $table->dropColumn('higher_secondary_schools');
            $table->dropColumn('active_blog_teachers');
            $table->dropColumn('active_users');
            $table->dropColumn('uploaded_by_teachers_innovation_stories');
            $table->dropColumn('uploaded_by_teachers_model');
        });
    }
}
