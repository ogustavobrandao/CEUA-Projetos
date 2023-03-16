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
            $table->text('detalhes_outros_cuidados_recuperacao')->nullable();
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
            $table->dropColumn('detalhes_outros_cuidados_recuperacao');
        });
    }
};
