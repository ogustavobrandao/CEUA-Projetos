<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TipoUsuario::factory(1)->create(['nome' => 'Administrador']);
        \App\Models\TipoUsuario::factory(1)->create(['nome' => 'Avaliador']);
        \App\Models\TipoUsuario::factory(1)->create(['nome' => 'Solicitante']);
    }
}
