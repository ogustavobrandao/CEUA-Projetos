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
        Schema::create('condicoes_animals', function (Blueprint $table) {
            $table->id();
            $table->text('condicoes_particulares');
            $table->string('num_animais_ambiente');
            $table->string('email_responsavel');
            $table->String('profissional_responsavel');
            $table->string('periodo');
            $table->string('ambiente_alojamento');
            $table->text('local');
            $table->string('dimensoes_ambiente');
            $table->string('tipo_cama');

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
        Schema::dropIfExists('condicoes_animals');
    }
};
