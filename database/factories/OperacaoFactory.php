<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operacao>
 */
class OperacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'observacao_recuperacao' => 'Observação da Recuperacao',
            'outros_cuidados_recuperacao' => 'Outros Cuidados da Recuperação',
            'analgesia_recuperacao' => 'Analgesia na Recuperação',
            'planejamento_id' => 1
        ];
    }
}
