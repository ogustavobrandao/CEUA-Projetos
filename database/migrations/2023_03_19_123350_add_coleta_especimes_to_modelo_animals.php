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
        Schema::table('modelo_animals', function (Blueprint $table) {
            $table->text('coleta_especimes');
            $table->boolean('flag_coleta_especimes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modelo_animals', function (Blueprint $table) {
            $table->dropColumn('coleta_especimes');
            $table->dropColumn('flag_coleta_especimes');
        });
    }
};
