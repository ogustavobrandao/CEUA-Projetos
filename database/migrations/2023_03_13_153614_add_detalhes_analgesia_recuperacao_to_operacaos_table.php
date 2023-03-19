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
            $table->text('detalhes_analgesia_recuperacao')->nullable();
            $table->text('detalhes_nao_uso_analgesia_recuperacao')->nullable();
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
            $table->dropColumn('detalhes_analgesia_recuperacao');
            $table->dropColumn('detalhes_nao_uso_analgesia_recuperacao')->nullable();
        });
    }
};
