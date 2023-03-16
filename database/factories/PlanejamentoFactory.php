<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planejamento>
 */
class PlanejamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'grau_invasividade' => 'GI2',
            
            'outras_infos' => 'Outras Informações',
            'analise_estatistica' => 'Analise Estatistica',
            'especificar_grupo' => 'Especificar Grupo',
            'criterios' => 'Criterios',
            'desc_materiais_metodos' => 'Descrições dos materiais e metodos',
            'num_animais_grupo' => '20',
            'modelo_animal_id' => 1
        ];
    }
}
