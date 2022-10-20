<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Procedimento>
 */
class ProcedimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */
    public function definition()
    {
        return [
            'relaxante' => 'Relaxante 1',
            'estresse' => 'Estresse',
            'jejum' => 'Jejum',
            'analgesico' => 'Analgesico',
            'anestesico' => 'Anestesico',
            'imobilizacao' => 'Imobilização',
            'inoculacao_substancia' => 'Inoculacao da Substancia',
            'restricao_hidrica' => 'Restrição Hidrica',
            'extracao' => 'Extração',
            'planejamento_id' => 1
        ];
    }
}
