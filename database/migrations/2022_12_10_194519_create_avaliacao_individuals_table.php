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
        Schema::create('avaliacao_individuals', function (Blueprint $table) {
            $table->id();
            $table->text('parecer')->nullable();
            $table->string('status');
            $table->string('tipo');
            $table->unsignedBigInteger('eutanasia_id')->nullable();
            $table->unsignedBigInteger('solicitacao_id')->nullable();
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->unsignedBigInteger('resultado_id')->nullable();
            $table->unsignedBigInteger('planejamento_id')->nullable();
            $table->unsignedBigInteger('condicoes_animal_id')->nullable();
            $table->unsignedBigInteger('dados_complementares_id')->nullable();
            $table->unsignedBigInteger('operacao_id')->nullable();
            $table->unsignedBigInteger('procedimento_id')->nullable();
            $table->unsignedBigInteger('modelo_animal_id')->nullable();
            $table->unsignedBigInteger('avaliacao_id')->nullable();

            $table->foreign('eutanasia_id')->references('id')->on('eutanasias')->onDelete('cascade');
            $table->foreign('solicitacao_id')->references('id')->on('solicitacaos')->onDelete('cascade');
            $table->foreign('responsavel_id')->references('id')->on('responsavels')->onDelete('cascade');
            $table->foreign('resultado_id')->references('id')->on('resultados')->onDelete('cascade');
            $table->foreign('planejamento_id')->references('id')->on('planejamentos')->onDelete('cascade');
            $table->foreign('condicoes_animal_id')->references('id')->on('condicoes_animals')->onDelete('cascade');
            $table->foreign('dados_complementares_id')->references('id')->on('dados_complementares')->onDelete('cascade');
            $table->foreign('operacao_id')->references('id')->on('operacaos')->onDelete('cascade');
            $table->foreign('procedimento_id')->references('id')->on('procedimentos')->onDelete('cascade');
            $table->foreign('modelo_animal_id')->references('id')->on('modelo_animals')->onDelete('cascade');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos')->onDelete('cascade');
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
        Schema::dropIfExists('avaliacao_individuals');
    }
};
