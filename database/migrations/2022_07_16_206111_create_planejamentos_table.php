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
        Schema::create('planejamentos', function (Blueprint $table) {
            $table->id();
            $table->text('grau_invasividade');
            $table->string('grau_select');
            $table->string('anexo_formula')->nullable();
            $table->string('justificativa')->nullable();
            $table->text('outras_infos');
            $table->text('analise_estatistica');
            $table->text('especificar_grupo');
            $table->text('criterios');
            $table->text('desc_materiais_metodos');
            $table->string('num_animais_grupo');

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
        Schema::dropIfExists('planejamentos');
    }
};
