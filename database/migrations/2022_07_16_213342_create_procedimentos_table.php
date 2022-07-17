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
        Schema::create('procedimentos', function (Blueprint $table) {
            $table->id();
            $table->boolean('relaxante');
            $table->boolean('estresse');
            $table->boolean('jejum');
            $table->boolean('analgesico');
            $table->boolean('anestesico');
            $table->boolean('imobilizacao');
            $table->boolean('inoculacao_substancia');
            $table->boolean('restricao_hidrica');
            $table->boolean('extracao');
            $table->unsignedBigInteger('operacao_id')->nullable();
            $table->unsignedBigInteger('eutanasia_id')->nullable();

            $table->foreign('operacao_id')->references('id')->on('operacaos');
            $table->foreign('eutanasia_id')->references('id')->on('eutanasias');
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
        Schema::dropIfExists('procedimentos');
    }
};
