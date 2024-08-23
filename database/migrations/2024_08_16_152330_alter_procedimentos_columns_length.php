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
        Schema::table('procedimentos', function (Blueprint $table) {
            $table->text('relaxante')->nullable()->change();
            $table->text('estresse')->nullable()->change();
            $table->text('analgesico')->nullable()->change();
            $table->text('anestesico')->nullable()->change();
            $table->text('imobilizacao')->nullable()->change();
            $table->text('inoculacao_substancia')->nullable()->change();
            $table->text('extracao')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procedimentos', function (Blueprint $table) {
            $table->string('relaxante', 255)->nullable()->change();
            $table->string('estresse', 255)->nullable()->change();
            $table->string('jejum', 255)->nullable()->change();
            $table->string('analgesico', 255)->nullable()->change();
            $table->string('anestesico', 255)->nullable()->change();
            $table->string('imobilizacao', 255)->nullable()->change();
            $table->string('inoculacao_substancia', 255)->nullable()->change();
            $table->string('restricao_hidrica', 255)->nullable()->change();
            $table->string('extracao', 255)->nullable()->change();
        });
    }
};
