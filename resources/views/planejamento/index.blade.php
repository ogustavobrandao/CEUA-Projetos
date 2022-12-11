@extends('layouts.formulario')

@section('content')
    @error('planejamento_id')
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @enderror
    <h2 class="titulo_h2" id="expand_dados_solicitacao"><span class="titulo_spam">Planejamento</span></h2>
    <div id="dados_solicitacao" class="col-md-10 my-2">
        <div class="mb-4">
            <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_5">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo" id="titulo_5">Dados Base
                            <a class="float-end" id="5_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="5_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="planejamento">
                @include('solicitacao.planejamento',['tipo'=>5,'avaliacao_id'=>$avaliacao->id,'id'=>$planejamento->id])
            </div>
        </div>

    </div>

    <h2 class="titulo_h2" id="expand_dados_solicitacao"><span class="titulo_spam">Componentes Conjuntos ao Planejamento</span></h2>

    <div id="dados_solicitacao2" class="col-md-10 my-2">
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Condição Animal
                            <a class="float-end" id="condicao_animal_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="condicao_animal_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="condicao_animal" style="display: none;">
                @include('solicitacao.condicoes_animais')
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Procedimento
                            <a class="float-end" id="procedimento_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="procedimento_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="procedimento" style="display: none; @if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
                @include('solicitacao.procedimento')
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Operação
                                <a class="float-end" id="operacao_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="operacao_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="operacao" style="display: none; @if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
                @include('solicitacao.operacao')
            </div>
        </div>

        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Eutanasia
                            <a class="float-end" id="eutanasia_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="eutanasia_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="eutanasia" style="display: none; @if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
                @include('solicitacao.eutanasia')
            </div>
        </div>

        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Resultado
                            <a class="float-end" id="resultado_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="resultado_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="resultado" style="display: none; @if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
                @include('solicitacao.resultado')
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
    <script type="text/javascript">

        $(document).ready(function () {
            // Planejamento
            @if(isset($avaliacaoPlanejamento) != null )
            alterarCorCard(5, '{{$avaliacaoPlanejamento->status}}');
            @endif

        });

        $('#5_btn_up').on('click', function () {
            $('#planejamento').slideToggle(800);
            $(this).hide();
            $('#5_btn_down').show();
        });

        $('#5_btn_down').on('click', function () {
            $('#planejamento').slideToggle(800);
            $(this).hide();
            $('#5_btn_up').show();
        });

        $('#condicao_animal_btn_up').on('click', function () {
            $('#condicao_animal').slideToggle(800);
            $(this).hide();
            $('#condicao_animal_btn_down').show();
        });

        $('#condicao_animal_btn_down').on('click', function () {
            $('#condicao_animal').slideToggle(800);
            $(this).hide();
            $('#condicao_animal_btn_up').show();
        });

        $('#procedimento_btn_up').on('click', function () {
            $('#procedimento').slideToggle(800);
            $(this).hide();
            $('#procedimento_btn_down').show();
        });

        $('#procedimento_btn_down').on('click', function () {
            $('#procedimento').slideToggle(800);
            $(this).hide();
            $('#procedimento_btn_up').show();
        });

        $('#operacao_btn_up').on('click', function () {
            $('#operacao').slideToggle(800);
            $(this).hide();
            $('#operacao_btn_down').show();
        });

        $('#operacao_btn_down').on('click', function () {
            $('#operacao').slideToggle(800);
            $(this).hide();
            $('#operacao_btn_up').show();
        });

        $('#eutanasia_btn_up').on('click', function () {
            $('#eutanasia').slideToggle(800);
            $(this).hide();
            $('#eutanasia_btn_down').show();
        });

        $('#eutanasia_btn_down').on('click', function () {
            $('#eutanasia').slideToggle(800);
            $(this).hide();
            $('#eutanasia_btn_up').show();
        });

        $('#resultado_btn_up').on('click', function () {
            $('#resultado').slideToggle(800);
            $(this).hide();
            $('#resultado_btn_down').show();
        });

        $('#resultado_btn_down').on('click', function () {
            $('#resultado').slideToggle(800);
            $(this).hide();
            $('#resultado_btn_up').show();
        });

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
