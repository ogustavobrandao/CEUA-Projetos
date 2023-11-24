<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'email' => 'admin@ufape.edu.br'
        ]);

        \App\Models\User::factory(1)->create([
            'email' => 'avaliador@ufape.edu.br',
            'tipo_usuario_id' => 2

        ]);

        \App\Models\User::factory(1)->create([
            'email' => 'solicitante@ufape.edu.br',
            'tipo_usuario_id' => 3
        ]);


    }
}
