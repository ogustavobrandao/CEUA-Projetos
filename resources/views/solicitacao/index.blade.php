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
                                <a class="float-end" id="0_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div id="dados_iniciais">
                @include('solicitacao.solicitacao',['tipo'=>0,'avaliacao_id'=>$avaliacao->id,'id'=>$solicitacao->id])
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_1">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo" id="titulo_1">2. Dados do Responsável
                            @if(isset($disabled))
                                <a class="float-end" id="1_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="1_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>

                    </div>
                </div>
            </div>
            <div id="dados_responsavel">
                @include('solicitacao.responsavel',['tipo'=>1,'avaliacao_id'=>$avaliacao->id,'id'=>$responsavel->id])
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
            <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_3">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo" id="titulo_3">4. Dados Complementares
                            @if(isset($disabled))
                                <a class="float-end" id="3_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="3_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                            @endif
                        </h2>

                    </div>
                </div>
            </div>
            <div id="dados_complementares">
                @include('solicitacao.solicitacao_fim',['tipo'=>3,'avaliacao_id'=>$avaliacao->id,'id'=>$solicitacao->dadosComplementares->id])
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
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <a class="btn btn-primary" href="{{route('avaliador.solicitacao.planejamento.avaliar', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                                @else
                                    <a class="btn btn-primary" href="{{route('solicitacao.planejamento.index', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                                @endif
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

    <!-- Utilizado para quando houver avaliação -->
    @if(Auth::user()->tipo_usuario_id == 2)

        <!-- Modal Pendencia -->
        <div class="modal fade" id="pendenciaModal" tabindex="-1" role="dialog" aria-labelledby="pendenciaModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Fechar</button>
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
        function showAvaliacaoIndividual(tipo,avaliacao_id,id) {

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
                    if(data[0] != null){
                        ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus required>"+ data[0]['parecer'] +"</textarea>"
                        exist = data[0]['id'];
                    }else{
                        ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus></textarea>"
                    }

                    $("#trocaConteudo").append(ret);
                    $("#titulo_pendencia").append("Pendência(s) - " + data[1]);

                    document.getElementById( "confirmPendencia" ).setAttribute( "onClick", "realizarAvaliacaoInd("+ tipo +","+ avaliacao_id +","+ id +", '"+ status +"')" );

                    $("#pendenciaModal").modal('show');
                }
            });
        }

        function closeModal(){
            $("#pendenciaModal").modal('hide');
        }

        function realizarAvaliacaoInd(tipo,avaliacao_id,id,status){

            if( ($("#parecerAval").val() != "" && status == "reprovado") || (status == "aprovado") ){
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

                        alterarCorCard(tipo,status);
                        $("#pendenciaModal").modal('hide');
                    }
                });
            }else{
                console.log("deu não")
            }
        }

        function alterarCorCard(tipo,status){
            if(status == "aprovado"){
                $("#fundo_"+tipo).css({"background-color": "#38c172"});
            }else{
                $("#fundo_"+tipo).css({"background-color": "#e3342f"});
            }
            $("#titulo_"+tipo).css({"color": "white"});
            $("#"+tipo+"_btn_up").css({"color": "black"});
            $("#"+tipo+"_btn_down").css({"color": "black"});
        }
    </script>
@endsection
