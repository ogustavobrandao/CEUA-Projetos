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
            'nome_vulgar' => 'Gato',
            'nome_cientifico' => 'Gatuno',
            'justificativa' => 'Justificativa',
            'geneticamente_modificado' => false,
            'numero_cqb' => '123456789',
            'procedencia' => 'animal_silvestre',
            'flag_captura' => false,
            'captura' => '',
            'flag_coleta_especimes' => false,
            'tipo_outra_procedencia' => '',
            'coleta_especimes' => '',
            'flag_marcacao' => false,
            'marcacao' => '',
            'flag_outras_info' => false ,
            'outras_info' => '',
            'solicitacao_id' => 1
        ];
    }
}
