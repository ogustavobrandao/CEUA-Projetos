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
        Schema::table('operacaos', function (Blueprint $table) {
            $table->text('observacao_recuperacao')->nullable()->change();
            $table->text('outros_cuidados_recuperacao')->nullable()->change();
            $table->text('analgesia_recuperacao')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operacaos', function (Blueprint $table) {
            $table->string('observacao_recuperacao', 255)->nullable()->change();
            $table->string('outros_cuidados_recuperacao', 255)->nullable()->change();
            $table->string('analgesia_recuperacao', 255)->nullable()->change();
        });
    }
};
