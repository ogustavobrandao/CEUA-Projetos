@extends('layouts.formulario')

@section('content')

    <h2 class="titulo_h2" id="expand_dados_solicitacao"><span class="titulo_spam">Dados da Solicitação</span></h2>
    <div id="dados_solicitacao" class="col-md-10 my-2">
        <div class="mb-4">
            <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_0">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo" id="titulo_0">1. Dados Iniciais
                            @if(isset($disabled))
                                <a class="float-end" id="0_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="0_btn_down" style="display: none"><i
                                        class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div id="dados_iniciais">
                @if(Auth::user()->tipo_usuario_id == 2)
                    @include('solicitacao.solicitacao',['tipo'=>0,'avaliacao_id'=>$avaliacao->id,'id'=>$solicitacao->id])
                @else
                    @include('solicitacao.solicitacao')
                @endif
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_1">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo" id="titulo_1">2. Dados do Responsável
                            @if(isset($disabled))
                                <a class="float-end" id="1_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="1_btn_down" style="display: none"><i
                                        class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>

                    </div>
                </div>
            </div>
            <div id="dados_responsavel">
                @if(Auth::user()->tipo_usuario_id == 2)
                    @include('solicitacao.responsavel',['tipo'=>1,'avaliacao_id'=>$avaliacao->id,'id'=>$responsavel->id])
                @else
                    @include('solicitacao.responsavel')
                @endif

            </div>
        </div>

        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">3. Dados do(s) Colaborador(es)
                            @if(!isset($solicitacao->responsavel))<small style="color: red; font-weight: bold">Necessária a criação de um responsável</small>@endif
                            @if(!isset($disabled) && isset($solicitacao->responsavel))
                                <a class="float-end" onclick="criarColaborador()" style="color: green"
                                   title="Adicionar Colaborador">
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
                @if(Auth::user()->tipo_usuario_id == 2)
                    {{--@include('solicitacao.colaborador',['tipo'=>3,'avaliacao_id'=>$avaliacao->id,'id'=>???])--}}
                @else
                    @include('solicitacao.colaborador')
                @endif
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_3">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo" id="titulo_3">4. Dados Complementares
                            @if(isset($disabled))
                                <a class="float-end" id="3_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="3_btn_down" style="display: none"><i
                                        class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>

                    </div>
                </div>
            </div>
            <div id="dados_complementares">
                @if(Auth::user()->tipo_usuario_id == 2)
                    @include('solicitacao.solicitacao_fim',['tipo'=>3,'avaliacao_id'=>$avaliacao->id,'id'=>$solicitacao->dadosComplementares->id])
                @else
                    @include('solicitacao.solicitacao_fim')
                @endif

            </div>
        </div>
    </div>


    <!-- Modal de Criação de Modelo Animal -->
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
                        @include('solicitacao.modelo_animal_modal')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dados_solicitacao" class="col-md-10">
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="titulo">5. Dados dos Modelos Animais
                            @if(Auth::user()->tipo_usuario_id == 3)
                            <a class="float-end "
                               data-toggle="modal"
                               data-target="#modeloAnimalModal"
                               style="color: green"
                               title="Adicionar Modelo Animal"><i
                                    class="fa-solid fa-circle-plus fa-2xl"></i></a></h3>
                            @endif
                    </div>
                </div>
            </div>
            @if(isset($solicitacao->modelosAnimais))
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
                            <tr id="fundo_modelo_{{$modelo_animal->id}}">
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
                                    @if(Auth::user()->tipo_usuario_id == 2)
                                        <a class="btn btn-primary"
                                           href="{{route('avaliador.solicitacao.planejamento.avaliar', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                                    @else
                                        <a class="btn btn-primary"
                                           href="{{route('solicitacao.planejamento.index', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                                        <a class="btn btn-primary" data-toggle="modal"
                                           data-target="#modeloAnimalEditModal{{$modelo_animal->id}}">Editar</a>
                                        <a class="btn btn-danger"
                                           href="{{route('solicitacao.modelo_animal.delete', ['id' => $modelo_animal->id])}}"
                                           onclick="return confirm('Você tem certeza que deseja apagar?')">Deletar</a>
                                    @endif
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
                            @include('solicitacao.modelo_animal', compact('modelo_animal'))
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

    <!-- Utilizado para quando houver avaliação -->
    @if(Auth::user()->tipo_usuario_id == 2)

        <!-- Modal Pendencia -->
        <div class="modal fade" id="pendenciaModal" tabindex="-1" role="dialog" aria-labelledby="pendenciaModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulo_pendencia"></h5>
                        <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_troca">
                        <div class="modal-body">
                            <div class="col-sm-12 mt-2" id="trocaConteudo">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">
                                Fechar
                            </button>
                            <button type="button" class="btn btn-success" id="confirmPendencia">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(document).ready(function () {
            //Abrir Modal de Criação de Modelo Animal se houver erro de validação
            @if(count($errors->modelo) > 0)
                $('#modeloAnimalModal').modal('show');
            @endif

            // Dados Iniciais
            @if(isset($avaliacaoDadosini) != null )
            alterarCorCard(0, '{{$avaliacaoDadosini->status}}');
            @endif

            // Responsável
            @if(isset($avaliacaoResponsavel) != null )
            alterarCorCard(1, '{{$avaliacaoResponsavel->status}}');
            @endif

            // Dados Complementares
            @if(isset($avaliacaoDadosComp) != null )
            alterarCorCard(3, '{{$avaliacaoDadosComp->status}}');
            @endif

            //Modelo Animal
            @foreach($solicitacao->modelosAnimais as $modelo_animal)
                @if(isset($avaliacao))
                    verificarAvalModelo('{{$modelo_animal->id}}','{{$avaliacao->id}}');
                @endif
            @endforeach

        });


        $('#0_btn_up').on('click', function () {
            $('#dados_iniciais').slideToggle(800);
            $(this).hide();
            $('#0_btn_down').show();
        });

        $('#0_btn_down').on('click', function () {
            $('#dados_iniciais').slideToggle(800);
            $(this).hide();
            $('#0_btn_up').show();
        });

        $('#1_btn_up').on('click', function () {
            $('#dados_responsavel').slideToggle(800);
            $(this).hide();
            $('#1_btn_down').show();
        });

        $('#1_btn_down').on('click', function () {
            $('#dados_responsavel').slideToggle(800);
            $(this).hide();
            $('#1_btn_up').show();
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

        // Dados Complementares
        $('#3_btn_up').on('click', function () {
            $('#dados_complementares').slideToggle(800);
            $(this).hide();
            $('#3_btn_down').show();
        });

        $('#3_btn_down').on('click', function () {
            $('#dados_complementares').slideToggle(800);
            $(this).hide();
            $('#3_btn_up').show();
        });

        <!-- Bloqueio de campos utilizado para avaliação -->
        @if(isset($disabled))
        @for($i = 0; $i < 12; $i++)
        $('#form{{$i}}').attr('action', 'numdeuné')
        $('#form{{$i}}').find('input, textarea, select, button').attr('disabled', 'disabled');
        @endfor
        @endif

        <!-- Ajax para avaliações individuais -->
        function showAvaliacaoIndividual(tipo, avaliacao_id, id) {

            $("#trocaConteudo").html("");
            $("#titulo_pendencia").html("");

            $.ajax({
                url: '/avaliacao_individual/' + tipo + '/' + avaliacao_id + '/' + id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var ret = "";
                    var status = "reprovado";
                    ret += "<input type=\"hidden\" name=\"avaliacao_id\" value=\"" + avaliacao_id + "\">";
                    ret += "<input type=\"hidden\" name=\"tipo\" value=\"" + tipo + "\">";
                    ret += "<input type=\"hidden\" name=\"id\" value=\"" + id + "\">";

                    ret += "<label for=\"parecer\" > Parecer: </label>";
                    if (data[0] != null) {
                        ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus required>" + data[0]['parecer'] + "</textarea>"
                        exist = data[0]['id'];
                    } else {
                        ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus></textarea>"
                    }

                    $("#trocaConteudo").append(ret);
                    $("#titulo_pendencia").append("Pendência(s) - " + data[1]);

                    document.getElementById("confirmPendencia").setAttribute("onClick", "realizarAvaliacaoInd(" + tipo + "," + avaliacao_id + "," + id + ", '" + status + "')");

                    $("#pendenciaModal").modal('show');
                }
            });
        }

        function closeModal() {
            $("#pendenciaModal").modal('hide');
        }

        function realizarAvaliacaoInd(tipo, avaliacao_id, id, status) {

            if (($("#parecerAval").val() != "" && status == "reprovado") || (status == "aprovado")) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('avaliador.avaliacao_ind.realizarAvaliacao')}}',
                    type: 'POST',
                    data: {
                        'tipo': tipo,
                        'avaliacao_id': avaliacao_id,
                        'id': id,
                        'parecer': $("#parecerAval").val(),
                        'status': status
                    },
                    success: function (data) {

                        alterarCorCard(tipo, status);
                        $("#pendenciaModal").modal('hide');
                    }
                });
            } else {
                console.log("deu não")
            }
        }

        function verificarAvalModelo(modelo,avaliacao){
            $.ajax({
                url: '/avaliacao_individual/verificar/modelo/' + modelo + '/' + avaliacao,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    alterarCorList(modelo,data);
                }
            });
        }

        function alterarCorCard(tipo,status){
            if(status == "aprovado"){
                $("#fundo_"+tipo).css({"background-color": "#38c172"});
            }else{
                $("#fundo_"+tipo).css({"background-color": "#9a5857"});
            }
            $("#titulo_"+tipo).css({"color": "white"});
            $("#"+tipo+"_btn_up").css({"color": "white"});
            $("#"+tipo+"_btn_down").css({"color": "white"});
        }

        function alterarCorList(id,status){
            if(status == "aprovado"){
                $("#fundo_modelo_"+id).css({"background-color": "#38c172","color": "white"});
            }
            else if(status == "reprovado"){
                $("#fundo_modelo_"+id).css({"background-color": "#e3342f","color": "white"});
            }
        }
    </script>
@endsection
