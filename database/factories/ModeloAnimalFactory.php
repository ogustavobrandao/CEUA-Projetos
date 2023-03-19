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
            'geneticamente_modificado' => true,
            'numero_cqb' => '123456789',
            'procedencia' => 'animal_silvestre',
            'flag_captura' => true,
            'captura' => 'Captura',
            'flag_coleta_especimes' => true,
            'tipo_outra_procedencia' => 'tipo_outra_procedencia',
            'coleta_especimes' => 'Coleta de Especimes',
            'flag_marcacao' => true,
            'marcacao' => 'Marcacao',
            'flag_outras_info' => true ,
            'outras_info' => 'Outras Informacoes',
            'solicitacao_id' => 1
        ];
    }
}
