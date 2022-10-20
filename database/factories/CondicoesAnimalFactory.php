<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CondicoesAnimal>
 */
class CondicoesAnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *     $table->text('condicoes_particulares');
    $table->string('num_animais_ambiente');
    $table->string('email_responsavel');
    $table->String('profissional_responsavel');
    $table->string('periodo');
    $table->string('ambiente_alojamento');
    $table->text('local');
    $table->string('dimensoes_ambiente');
    $table->string('tipo_cama');

    $table->unsignedBigInteger('planejamento_id');
     */
    public function definition()
    {
        return [
            'condicoes_particulares' => 'Condições Particulares',
            'num_animais_ambiente' => '20',
            'email_responsavel' => 'responsavel@responsavel.com',
            'profissional_responsavel' => 'Responsavel',
            'periodo' => 'Periodo',
            'ambiente_alojamento' => 'Gaiola',
            'local' => 'Mata fechada',
            'dimensoes_ambiente' => '4x4',
            'tipo_cama' => 'Gaiola',
            'planejamento_id' => 1
        ];
    }
}
