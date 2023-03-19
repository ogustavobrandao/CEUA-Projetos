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
            $table->text('captura');
            $table->boolean('flag_captura');
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
            $table->dropColumn('captura');
            $table->dropColumn('flag_captura');
        });
    }
};
