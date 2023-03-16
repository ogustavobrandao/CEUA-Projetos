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
            $table->string('termo_consentimento')->nullable();;
            $table->string('nome_cientifico');
            $table->text('justificativa');
            $table->boolean('geneticamente_modificado');
            $table->string('procedencia');
            
            $table->unsignedBigInteger('solicitacao_id');
            $table->foreign('solicitacao_id')->references('id')->on('solicitacaos')->onDelete('cascade');
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
