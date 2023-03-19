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
            $table->text('outras_info');
            $table->boolean('flag_outras_info');
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
            $table->dropColumn('outras_info');
            $table->dropColumn('flag_outras_info');
        });
    }
};
