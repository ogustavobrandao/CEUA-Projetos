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
        Schema::table('colaboradors', function (Blueprint $table) {

            $table->string('experiencia_previa')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @returan void
     */
    public function down()
    {
        Schema::table('colaboradors', function (Blueprint $table) {
            //
        });
    }
};
