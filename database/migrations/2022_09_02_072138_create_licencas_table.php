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
        Schema::create('licencas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('inicio');
            $table->date('fim');
            $table->string('codigo');

            $table->unsignedBigInteger('avaliacao_id');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencas');
    }
};
