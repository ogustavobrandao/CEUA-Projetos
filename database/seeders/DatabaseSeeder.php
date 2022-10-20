<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            InstituicaoSeeder::class,
            UnidadeSeeder::class,
            DepartamentoSeeder::class,
            TipoUsuarioSeeder::class,
            UsuarioSeeder::class,
            SolicitacaoSeeder::class,
            ModeloAnimalSeeder::class,
            PerfilSeeder::class,
            PlanejamentoSeeder::class
        ]);
    }
}
