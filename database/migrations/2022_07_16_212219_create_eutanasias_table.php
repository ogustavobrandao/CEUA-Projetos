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
            $table->text('justificativa_metodo');
            $table->text('descarte');
            $table->text('destino');
            $table->text('descricao');
            $table->text('metodo');
            $table->unsignedBigInteger('procedimento_id');

            $table->foreign('procedimento_id')->references('id')->on('procedimentos')->onDelete('cascade');
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
