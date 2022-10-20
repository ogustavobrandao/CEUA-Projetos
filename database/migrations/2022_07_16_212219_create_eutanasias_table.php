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
        Schema::create('eutanasias', function (Blueprint $table) {
            $table->id();
            $table->text('justificativa_metodo')->nullable();
            $table->text('descarte');
            $table->text('destino');
            $table->text('descricao')->nullable();
            $table->text('metodo')->nullable();

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
        Schema::dropIfExists('eutanasias');
    }
};
