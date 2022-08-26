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
            $table->text('relevancia')->nullable();
            $table->string('titulo_en')->nullable();
            $table->dateTime('inicio')->nullable();
            $table->dateTime('fim')->nullable();
            $table->string('tipo')->nullable();
            $table->text('justificativa')->nullable();
            $table->text('objetivos')->nullable();
            $table->text('resumo')->nullable();
            $table->string('titulo_pt')->nullable();
            $table->string('area_conhecimento')->nullable();
            $table->integer('estado_pagina');
            $table->integer('estado_pagina_maximo');
            $table->string('status')->nullable();
            $table->bigInteger('avaliador_atual_id')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
