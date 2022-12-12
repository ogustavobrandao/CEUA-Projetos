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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->string('grupo_animal');
            $table->string('linhagem');
            $table->integer('idade');
            $table->string('periodo');
            $table->string('peso');
            $table->string('quantidade');
            $table->string('machos');
            $table->string('femeas');
            $table->string('total');
            $table->unsignedBigInteger('modelo_animal_id');

            $table->foreign('modelo_animal_id')->references('id')->on('modelo_animals')->onDelete('cascade');
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
        Schema::dropIfExists('perfils');
    }
};
