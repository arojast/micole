<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hs_id');
            $table->unsignedBigInteger('director_id');
            $table->unsignedBigInteger('mec_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('city_id');
            $table->string('name');
            $table->integer('postal');
            $table->string('phone');
            $table->string('password');
            $table->string('email');
            $table->string('email2');
            $table->string('website');
            $table->string('fax');
            $table->string('addres');
            $table->string('addres_short');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('plan_preference');
            $table->smallInteger('leads');
            $table->string('bussiness_status');
            $table->smallInteger('google_user_ratings_total');
            $table->float('google_rating');
            $table->string('revisor');
            $table->smallInteger('active');
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
        Schema::dropIfExists('schools');
    }
};
