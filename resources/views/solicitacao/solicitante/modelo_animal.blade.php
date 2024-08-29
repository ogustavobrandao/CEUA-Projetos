@extends('layouts.formulario')

@section('form')



<div class="row">
    <div class="col-md-12">

        <h3 class="titulo" id="titulo_4">5. Dados dos Modelos Animais

            @if (Auth::user()->hasRole('Solicitante') && $solicitacao->status != 'avaliado')
                @include('solicitacao.solicitante.modelo_animal_modal_solicitante')
                <a class="btn btn-secondary float-end " data-toggle="modal" data-target="#modeloAnimalModal"
                    title="Adicionar Modelo Animal">Criar Modelo Animal</a>
        </h3>
        @endif

    </div>
</div>

@if (isset($solicitacao->modelosAnimais))
    <div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px;">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome Científico</th>
                    <th scope="col">Procedência</th>
                    <th scope="col">Linhagem</th>
                    <th scope="col">Idade</th>
                    <th class="text-center" scope="col" style="width: 20%">Ações</th>
                </tr>
            </thead>
            <tbody id="modelo_animal-info">
                @foreach ($solicitacao->modelosAnimais as $modelo_animal)
                    <tr id="fundo_modelo_{{ $modelo_animal->id }}">
                        <td>
                            {{ $modelo_animal->nome_cientifico }}
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
                                {{ $modelo_animal->outra_procedencia }}
                            @endif

                        </td>
                        <td>
                            {{ $modelo_animal->perfil->linhagem ?? 'Não preenchido' }}
                        </td>
                        <td>
                            {{ $modelo_animal->perfil->idade ?? 'Não preenchido' }}
                        </td>
                        <td class="text-center">
                            <a class="btn btn-primary"
                                href="{{ route('solicitacao.planejamento.index', ['modelo_animal_id' => $modelo_animal->id]) }}">Abrir</a>
                            @if (Auth::user()->hasRole('Solicitante') && $solicitacao->status != 'avaliado')
                                <a class="btn btn-danger btn-deletar-modelo-animal"
                                    href="{{ route('solicitacao.modelo_animal.delete', ['id' => $modelo_animal->id]) }}">Deletar</a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
