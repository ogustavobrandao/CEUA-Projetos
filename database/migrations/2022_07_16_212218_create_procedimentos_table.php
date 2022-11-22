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
            $table->string('relaxante')->nullable();
            $table->string('estresse')->nullable();
            $table->string('jejum')->nullable();
            $table->string('analgesico')->nullable();
            $table->string('anestesico')->nullable();
            $table->string('imobilizacao')->nullable();
            $table->string('inoculacao_substancia')->nullable();
            $table->string('restricao_hidrica')->nullable();
            $table->string('extracao')->nullable();

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
