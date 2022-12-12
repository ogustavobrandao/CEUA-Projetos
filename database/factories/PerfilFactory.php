<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perfil>
 */
class PerfilFactory extends Factory
{
    public function definition()
    {
        return [
            'grupo_animal' => 'Grupo 5',
            'linhagem' => 'Linhagem',
            'idade' => '10',
            'periodo' => 'Anos',
            'peso' => '10 kg',
            'quantidade' => '10',
            'machos' => '10',
            'femeas' => '10',
            'total' => '20',
            'modelo_animal_id' => 1
        ];
    }
}
