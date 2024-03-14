<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resultado>
 */
class ResultadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'abate' => 'Abate',
            'destino_animais' => 'Destino',
            'justificativa_metodos' => 'Justificativa dos Metodos',
            'resumo_procedimento' => 'Resumo do ProcedimentoSeeder',
            'outras_informacoes' => 'Outras informações',
            'planejamento_id' => 1
        ];
    }
}
