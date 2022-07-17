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
        Schema::create('modelo_animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome_vulgar');
            $table->string('nome_cientifico');
            $table->text('justificativa');
            $table->boolean('geneticamente_modificado');
            $table->string('procedencia');
            $table->unsignedBigInteger('planejamento_id')->nullable();
            $table->unsignedBigInteger('condicoes_id')->nullable();
            $table->unsignedBigInteger('perfil_id')->nullable();

            $table->foreign('planejamento_id')->references('id')->on('planejamentos');
            $table->foreign('condicoes_id')->references('id')->on('condicoes');
            $table->foreign('perfil_id')->references('id')->on('perfis');
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
        Schema::dropIfExists('modelo_animals');
    }
};
