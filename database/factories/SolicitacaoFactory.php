<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solicitacao>
 */
class SolicitacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo_en' => 'Titulo English',
            'fim' => today(),
            'user_id' => 3,
            'tipo' => 'Extensão',
            'titulo_pt' => 'Titulo Portugues',
            'inicio' => today(),
            'area_conhecimento' => 'Area de conhecimento',
            'estado_pagina' => 0,
            'estado_pagina_maximo' => 0
        ];
    }
}
