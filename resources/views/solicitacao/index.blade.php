@extends('layouts.formulario')

@section('content')
    <h2 class="titulo_h2" id="expand_dados_solicitacao"><span class="titulo_spam">Dados da Solicitação</span></h2>
    <div id="dados_solicitacao" class="col-md-10 my-2">
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">1. Dados Iniciais
                            @if(isset($disabled))
                                <a class="float-end" id="dados_iniciais_btn_up"><i
                                        class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_iniciais_btn_down" style="display: none"><i
                                        class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div id="dados_iniciais">
                @include('solicitacao.solicitacao')
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">2. Dados do Responsável
                            @if(isset($disabled))
                                <a class="float-end" id="dados_responsavel_btn_up"><i
                                        class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_responsavel_btn_down" style="display: none"><i
                                        class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>

                    </div>
                </div>
            </div>
            <div id="dados_responsavel">
                @include('solicitacao.responsavel')
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">3. Dados do(s) Colaborador(es)
                            @if(!isset($disabled))
                                <a class="float-end" onclick="criarColaborador()" style="color: green" title="Adicionar Colaborador">
                                    <i class="fa-solid fa-circle-plus fa-2xl"></i></a>
                            @endif
                            @if(isset($disabled))
                                <a class="float-end" id="dados_colaborador_btn_up"><i
                                        class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_colaborador_btn_down" style="display: none"><i
                                        class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div id="dados_colaborador">
                @include('solicitacao.colaborador')
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">4. Dados Complementares
                            @if(isset($disabled))
                                <a class="float-end" id="dados_complementares_btn_up"><i
                                        class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_complementares_btn_down" style="display: none"><i
                                        class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>

                    </div>
                </div>
            </div>
            <div id="dados_complementares">
                @include('solicitacao.solicitacao_fim')
            </div>
        </div>
    </div>


    <div id="dados_solicitacao" class="col-md-10">
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="titulo">5. Dados dos Modelos Animais
                            <a class="float-end "
                               data-toggle="modal"
                               data-target="#modeloAnimalModal"
                               style="color: green"
                               title="Adicionar Modelo Animal"><i
                                    class="fa-solid fa-circle-plus fa-2xl"></i></a></h3>
                    </div>
                </div>
                @if(isset($solicitacao->modelosAnimais))
            </div>
            <div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px;">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome Ciêntifico</th>
                        <th scope="col">Procedência</th>
                        <th scope="col">Linhagem</th>
                        <th scope="col">Idade</th>
                        <th class="text-center" scope="col" style="width: 20%">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($solicitacao->modelosAnimais as $modelo_animal)
                        <tr>
                            <td>
                                {{$modelo_animal->nome_cientifico}}
                            </td>
                            <td>
                                {{$modelo_animal->procedencia}}
                            </td>
                            <td>
                                {{$modelo_animal->perfil->linhagem}}
                            </td>
                            <td>
                                {{$modelo_animal->perfil->idade}}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary"
                                   href="{{route('solicitacao.planejamento.index', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>

                                <a class="btn btn-primary" data-toggle="modal"
                                   data-target="#modeloAnimalEditModal{{$modelo_animal->id}}">Editar</a>
                                <a class="btn btn-danger"
                                   href="{{route('solicitacao.modelo_animal.delete', ['id' => $modelo_animal->id])}}"
                                   onclick="return confirm('Você tem certeza que deseja apagar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @endif
            </div>

            <div class="row mt-4">
                <div class="col-4">
                    <a class="btn btn-secondary w-100"
                       href="{{route('solicitacao.solicitante.index')}}">Voltar</a>
                </div>
                <div class="col-4"></div>

                <div class="col-4">
                    @if($solicitacao->status == null)
                        <a class="btn w-100"
                           href="{{route('solicitacao.concluir', ['solicitacao_id' => $solicitacao->id])}}"
                           style="border-color: #1d68a7; color: #1d68a7; background-color: #c0ddf6"
                           title="Concluir Solicitação.">Concluir Solicitação</a>
                    @endif
                </div>

            </div>
        </div>
    </div>

    @foreach($solicitacao->modelosAnimais as $modelo_animal)
        <!-- Modal -->
        <div class="modal fade" id="modeloAnimalEditModal{{$modelo_animal->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLongTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edição de Modelo Animal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{route('solicitacao.modelo_animal.update')}}">
                        @csrf
                        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">

                        <div class="modal-body">
                            @include('solicitacao.modelo_animal_form', compact('modelo_animal'))
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="modeloAnimalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Modelo Animal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('solicitacao.modelo_animal.criar')}}">
                    @csrf
                    <div class="modal-body">
                        @include('solicitacao.modelo_animal_form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#dados_iniciais_btn_up').on('click', function () {
            $('#dados_iniciais').slideToggle(800);
            $(this).hide();
            $('#dados_iniciais_btn_down').show();
        });

        $('#dados_iniciais_btn_down').on('click', function () {
            $('#dados_iniciais').slideToggle(800);
            $(this).hide();
            $('#dados_iniciais_btn_up').show();
        });

        $('#dados_responsavel_btn_up').on('click', function () {
            $('#dados_responsavel').slideToggle(800);
            $(this).hide();
            $('#dados_responsavel_btn_down').show();
        });

        $('#dados_responsavel_btn_down').on('click', function () {
            $('#dados_responsavel').slideToggle(800);
            $(this).hide();
            $('#dados_responsavel_btn_up').show();
        });

        $('#dados_colaborador_btn_up').on('click', function () {
            $('#dados_colaborador').slideToggle(800);
            $(this).hide();
            $('#dados_colaborador_btn_down').show();
        });

        $('#dados_colaborador_btn_down').on('click', function () {
            $('#dados_colaborador').slideToggle(800);
            $(this).hide();
            $('#dados_colaborador_btn_up').show();
        });

        $('#dados_complementares_btn_up').on('click', function () {
            $('#dados_complementares').slideToggle(800);
            $(this).hide();
            $('#dados_complementares_btn_down').show();
        });

        $('#dados_complementares_btn_down').on('click', function () {
            $('#dados_complementares').slideToggle(800);
            $(this).hide();
            $('#dados_complementares_btn_up').show();
        });


    </script>

@endsection
