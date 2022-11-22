<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perfil>
 */
class PerfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *     $table->string('grupo_animal');
    $table->string('linhagem');
    $table->string('idade');
    $table->string('peso');
    $table->string('quantidade');
    $table->string('machos');
    $table->string('femeas');
    $table->string('total');
    $table->unsignedBigInteger('modelo_animal_id');

    $table->foreign('modelo_animal_id')->references('id')->on('modelo_animals')->onDelete('cascade');
     */
    public function definition()
    {
        return [
            'grupo_animal' => 'Grupo 5',
            'linhagem' => 'Linhagem',
            'idade' => '10 dias',
            'peso' => '10 kg',
            'quantidade' => '10',
            'machos' => '10',
            'femeas' => '10',
            'total' => '20',
            'modelo_animal_id' => 1
        ];
    }
}
