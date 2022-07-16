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
        Schema::create('responsavels', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->boolean('treinamento');
            $table->boolean('experiencia_previa');
            $table->string('vinculo_instituicao');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('contato_id')->nullable();

            $table->foreign('contato_id')->references('id')->on('contatos');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
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
        Schema::dropIfExists('responsavels');
    }
};
