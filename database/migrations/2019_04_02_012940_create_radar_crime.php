<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadarCrime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radar_crime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('radar_id');
            $table->foreign('radar_id')->references('id')->on('radar');
            $table->unsignedBigInteger('crime_id');
            $table->foreign('crime_id')->references('id')->on('crime');
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
        Schema::dropIfExists('radar_crime');
    }
}
