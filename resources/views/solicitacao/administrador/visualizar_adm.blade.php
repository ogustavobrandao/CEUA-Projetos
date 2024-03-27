@extends('layouts.formulario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="titulo_h2 border-bottom" id="expand_dados_solicitacao"><span
                    class="font-weight-bold">Solicitação</span></h2>
            <div id="dados_solicitacao" class="my-2">
                <div class="mb-4">
                    <div class="card p-3 " style="border-radius: 10px 10px 0px 0px;" id="fundo_0">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="titulo" id="titulo_0">1. Dados Iniciais
                                    <a class="float-end" id="0_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                    <a class="float-end" id="0_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    @include('component.modal_fail')
                    <div id="dados_iniciais">
                        @include('solicitacao.administrador.solicitacao_adm')
                    </div>
                </div>
                <div class="mb-4">
                    <div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_1">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="titulo" id="titulo_1">2. Dados do Responsável
                                    <a class="float-end" id="1_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                    <a class="float-end" id="1_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div id="dados_responsavel">
                        @include('solicitacao.administrador.responsavel_adm')
                    </div>
                </div>
                <div class="mb-4">
                    @include('solicitacao.colaborador.form_adm', ['visualizar' => true])    <var></var>
                </div>
                <div class="mb-4">
                    <div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_3">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="titulo" id="titulo_3">4. Dados Complementares
                                    <a class="float-end" id="3_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                    <a class="float-end" id="3_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div id="dados_complementares">
                        @include('solicitacao.administrador.solicitacao_fim_adm')
                    </div>
                </div>
            </div>
            <!-- Modal de Criação de Modelo Animal -->
            <div class="modal fade" id="modeloAnimalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Modelo Animal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            @csrf
                            <div class="modal-body">
                                @include('solicitacao.administrador.modelo_animal_modal')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>

                    </div>
                </div>
            </div>
            <div id="dados_solicitacao">
                <div class="mb-4">
                    <div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_4">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="titulo" id="titulo_4">5. Dados dos Modelos Animais</h3>
                            </div>
                        </div>
                    </div>
                    @if(isset($solicitacao->modelosAnimais))
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
                                <tbody>
                                @foreach($solicitacao->modelosAnimais as $modelo_animal)
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
                                                {{$modelo_animal->outra_procedencia}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$modelo_animal->perfil->linhagem ?? 'Não preenchido'}}
                                        </td>
                                        <td>
                                            {{$modelo_animal->perfil->idade ?? 'Não preenchido'}}
                                        </td>
                                        <td class="text-center">
                                            
                                            <a class="btn btn-primary" href="{{route('solicitacao.planejamento.index.adm', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                                             
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mt-4 my-4 row">
                <div class="col-3">
                        <a type="button" class="btn btn-secondary w-100" href="{{ route('solicitacao.admin.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input, select, textarea').prop('disabled', true);
        });


        window.onload = function() {
            var isAdmin = <?php echo (Auth::user()->tipo_usuario_id == 1) ? 'true' : 'false'; ?>;

            if (isAdmin) {
                var forms = document.getElementsByTagName("form");
                for (var i = forms.length - 1; i >= 0; i--) {
                    var form = forms[i];
                    while (form.firstChild) {
                        form.parentNode.insertBefore(form.firstChild, form);
                    }
                    form.parentNode.removeChild(form);
                }
            }
        }

    </script>
@endsection
