<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Unidade::factory(1)->create(
            [
                'nome' => 'Unidade de Garanhuns',
                'instituicao_id' => 1
            ]);
    }
}
