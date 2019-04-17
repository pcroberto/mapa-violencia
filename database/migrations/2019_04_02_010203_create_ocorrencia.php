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
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vitima_id');
            $table->foreign('vitima_id')->references('id')->on('vitimas');
            $table->unsignedBigInteger('localizacao_id');
            $table->foreign('localizacao_id')->references('id')->on('localizacoes');
            $table->unsignedBigInteger('crime_id');
            $table->foreign('crime_id')->references('id')->on('crimes');
            $table->text('descricao');
            $table->datetime('datahora');
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
        Schema::dropIfExists('ocorrencias');
    }
}
