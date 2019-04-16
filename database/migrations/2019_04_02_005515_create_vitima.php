<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitimas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino'])->nullable();
            $table->enum('etnia', ['Branco', 'Pardo', 'Negro', 'Indígena', 'Amarelo', 'Outro'])->nullable();
            $table->date('data_nascimento')->nullable();
            $table->boolean('boletim');
            $table->string('email')->nullable();
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
        Schema::dropIfExists('vitimas');
    }
}
