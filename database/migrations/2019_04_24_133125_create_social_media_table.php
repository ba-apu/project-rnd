<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            /*$table->integer('service_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();*/

            $table->integer('total_fb_page_active')->nullable();
            $table->integer('total_public_officials_sensitized')->nullable();
            $table->integer('total_e_service_implemented')->nullable();
            $table->integer('total_e_service_implemented_through_e_service_ecceletor')->nullable();
            $table->integer('total_organization')->nullable();
            $table->integer('total_organization_capable_design_e_service')->nullable();
            $table->integer('no_of_benificiaries')->nullable();

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
        Schema::dropIfExists('social_media');
    }
}
