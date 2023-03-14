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
            'detalhes_observacao_recuperacao' => 'Detalhes da Recuperação',
            'detalhes_analgesia_recuperacao' => 'Detalhes da Anestesia',
            'detalhes_outros_cuidados_recuperacao' => 'Detalhes dos Outros Cuidados',
            'detalhes_cirurgia' => 'Detalhes da Cirurgia',
            'planejamento_id' => 1
        ];
    }
}
