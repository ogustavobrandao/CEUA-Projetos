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
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('treinamento');
            $table->string('experiencia_previa');
            $table->string('grau_escolaridade');
            $table->unsignedBigInteger('instituicao_id');
            $table->unsignedBigInteger('responsavel_id');
            $table->foreign('responsavel_id')->references('id')->on('responsavels')->onDelete('cascade');
            $table->foreign('instituicao_id')->references('id')->on('instituicaos');
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
        Schema::dropIfExists('colaboradors');
    }
};
