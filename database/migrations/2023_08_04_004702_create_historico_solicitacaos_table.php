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
        Schema::create('historico_solicitacaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitacao_id')->constrained('solicitacaos','id')->onDelete('cascade');
            $table->string('status_solicitacao');
            $table->string('nome_usuario_modificador');
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
        Schema::dropIfExists('historico_solicitacaos');
    }
};
