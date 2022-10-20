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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->boolean('abate');
            $table->text('destino_animais');
            $table->text('justificativa_metodos');
            $table->text('resumo_procedimento');
            $table->text('outras_infos');
            $table->unsignedBigInteger('planejamento_id');
            $table->foreign('planejamento_id')->references('id')->on('planejamentos')->onDelete('cascade');
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
        Schema::dropIfExists('resultados');
    }
};
