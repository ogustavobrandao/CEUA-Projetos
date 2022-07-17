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
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->id();
            $table->text('relevancia');
            $table->string('titulo_en')->nullable();
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->string('tipo');
            $table->text('justificativa');
            $table->text('objetivos');
            $table->text('resumo');
            $table->string('titulo_pt');
            $table->string('area_conhecimento');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('resultado_id')->nullable();
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->unsignedBigInteger('modelo_animal_id')->nullable();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('resultado_id')->references('id')->on('resultados');
            $table->foreign('responsavel_id')->references('id')->on('responsavels');
            $table->foreign('modelo_animal_id')->references('id')->on('modelo_animals');
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
        Schema::dropIfExists('solicitacaos');
    }
};
