<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModeloAnimal>
 */
class ModeloAnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        return [
            'termo_consentimento' => 'lista6.pdf',
            'nome_vulgar' => 'Gato',
            'nome_cientifico' => 'Gatuno',
            'justificativa' => 'Justificativa',
            'geneticamente_modificado' => true,
            'numero_cqb' => '123456789',
            'procedencia' => 'Procedencia',
            'solicitacao_id' => 1
        ];
    }
}
