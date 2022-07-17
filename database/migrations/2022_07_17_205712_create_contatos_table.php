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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('telefone');
            $table->unsignedBigInteger('colaborador_id')->nullable();
            $table->unsignedBigInteger('responsavel_id')->nullable();

            $table->foreign('responsavel_id')->references('id')->on('responsavels')->onDelete('cascade');
            $table->foreign('colaborador_id')->references('id')->on('colaboradors')->onDelete('cascade');
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
        Schema::dropIfExists('contatos');
    }
};
