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
            'email' => 'admin@admin.com'
        ]);

        \App\Models\User::factory(1)->create([
            'email' => 'solicitante@solicitante.com'
        ]);

        \App\Models\User::factory(1)->create([
            'email' => 'avaliador@avaliador.com'
        ]);
    }
}
