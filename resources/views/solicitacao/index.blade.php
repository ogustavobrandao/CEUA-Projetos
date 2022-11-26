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
                                <a class="float-end" id="dados_iniciais_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_iniciais_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
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
                                <a class="float-end" id="dados_responsavel_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_responsavel_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
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
                                <a class="float-end" onclick="criarColaborador()"><i class="fa-solid fa-user-plus" style="font-size: 30px; rotate: 90deg;"></i></a>
                            @endif
                            @if(isset($disabled))
                                <a class="float-end" id="dados_colaborador_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_colaborador_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
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
                                <a class="float-end" id="dados_complementares_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="dados_complementares_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
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

    <h2 class="titulo_h2" id="expand_dados_solicitacao"><span class="titulo_spam">Dados dos Modelos Animais</span></h2>


    <div class="row my-5 justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-8">
                    <label>Pesquisar:</label>
                    <input type="text">
                </div>
                <div class="col-sm-4"><a class="btn btn-primary float-right mb-1" data-toggle="modal" data-target="#modeloAnimalModal">Criar Modelo</a></div>
            </div>
            @if(isset($modelo_animais))
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome Ciêntifico</th>
                        <th scope="col">Procedência</th>
                        <th scope="col">Linhagem</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modelo_animais as $modelo_animal)
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
                            <td>
                                <a class="btn btn-primary" href="{{route('solicitacao.planejamento.index', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modeloAnimalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
