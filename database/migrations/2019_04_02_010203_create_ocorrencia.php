<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vitima_id');
            $table->foreign('vitima_id')->references('id')->on('vitima');
            $table->unsignedBigInteger('localizacao_id');
            $table->foreign('localizacao_id')->references('id')->on('localizacao');
            $table->unsignedBigInteger('crime_id');
            $table->foreign('crime_id')->references('id')->on('crime');
            $table->string('titulo', 100);
            $table->text('descricao');
            $table->date('data');
            $table->date('hora');
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
        Schema::dropIfExists('ocorrencia');
    }
}
