@if(isset($modelosAnimais))
    @foreach($modelosAnimais as $modelo_animal)
        <tr id="fundo_modelo_{{$modelo_animal->id}}">
            <td>
                {{$modelo_animal->nome_cientifico}}
            </td>
            <td>
                @if ($modelo_animal->procedencia == 'animal_comprado')
                    Animal Comprado
                @elseif ($modelo_animal->procedencia == 'animal_criacao')
                    Animal Criação
                @elseif ($modelo_animal->procedencia == 'animal_doado')
                    Animal Doado
                @elseif ($modelo_animal->procedencia == 'animal_silvestre')
                    Animal Silvestre
                @elseif ($modelo_animal->procedencia == 'aviario')
                    Aviário
                @elseif ($modelo_animal->procedencia == 'bioterio')
                    Biotério
                @elseif ($modelo_animal->procedencia == 'fazenda')
                    Fazenda
                @elseif ($modelo_animal->procedencia == 'outra_procedencia')
                    {{$modelo_animal->outra_procedencia}}}
                @endif

            </td>
            <td>
                {{$modelo_animal->perfil->linhagem ?? 'Não preenchido'}}
            </td>
            <td>
                {{$modelo_animal->perfil->idade ?? 'Não preenchido'}}
            </td>
            <td class="text-center">
                
                <a class="btn btn-primary"
                    href="{{route('avaliador.solicitacao.planejamento.avaliar', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                
            </td>
        </tr>
    @endforeach
@endif
