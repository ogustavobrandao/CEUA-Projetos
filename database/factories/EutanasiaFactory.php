<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eutanasia>
 */
class EutanasiaFactory extends Factory
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
            'justificativa_metodo' => 'Justificativa do Metodo',
            'descarte' => 'Descarte',
            'destino' => 'Destino',
            'descricao' => 'Descricao',
            'metodo' => 'Metodo',
            'planejamento_id' => 1
        ];
    }
}
