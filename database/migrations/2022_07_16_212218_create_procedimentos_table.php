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
            $table->string('relaxante');
            $table->string('estresse');
            $table->string('jejum');
            $table->string('analgesico');
            $table->string('anestesico');
            $table->string('imobilizacao');
            $table->string('inoculacao_substancia');
            $table->string('restricao_hidrica');
            $table->string('extracao');

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
        Schema::dropIfExists('procedimentos');
    }
};
