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
        Schema::create('operacaos', function (Blueprint $table) {
            $table->id();
            $table->boolean('observacao_recuperacao');
            $table->boolean('outros_cuidados_recuperacao');
            $table->boolean('analgesia_recuperacao');
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
        Schema::dropIfExists('operacaos');
    }
};
