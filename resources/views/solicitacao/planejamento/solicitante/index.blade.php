@extends('layouts.formulario')

@section('form')
    @error('planejamento_id')
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @enderror
    @include('component.modal_fail')
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="titulo_h2 border-bottom" id="expand_dados_solicitacao"><span class="font-weight-bold">Modelo Animal</span></h2>
            <div id="dados_modelo" class="my-2">
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_4">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="titulo" id="titulo_4">Dados Base do Modelo Animal
                                    <a class="float-end" id="4_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                    <a class="float-end" id="4_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div id="modelo_animal">
                        <div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
                            <form method="POST" action="{{route('solicitacao.modelo_animal.update', ['id' => $modelo_animal->id])}}"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
                                <div class="modal-body">
                                    @include('solicitacao.planejamento.solicitante.modelo_animal_solicitante')
                                    @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                    && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                                        @include('component.botoes_new_form',['tipo'=>4,'id'=>$modelo_animal->id,'status'=>$avaliacaoModeloAnimal->status])
                                    @else
                                        @include('component.botoes_new_form')
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <h2 class="titulo_h2 border-bottom" id="expand_dados_solicitacao"><span class="titulo_spam">Planejamento</span></h2>
            <div id="dados_solicitacao" class="my-2">
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_5">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="titulo" id="titulo_5">Dados Base do Planejamento
                                    <a class="float-end" id="5_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                    <a class="float-end" id="5_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div id="planejamento">
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.planejamento.solicitante.planejamento',['tipo'=>5,'id'=>$planejamento->id,'status'=>$avaliacaoPlanejamento->status])
                        @else
                            @include('solicitacao.planejamento.solicitante.planejamento')
                        @endif
                    </div>
                </div>

            </div>

            <h2 class="titulo_h2 border-bottom" id="expand_dados_solicitacao"><span class="titulo_spam">Componentes Conjuntos ao Planejamento</span>
            </h2>

            <div id="dados_solicitacao2" class="my-2">
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_6">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="titulo" id="titulo_6">Condição Animal
                                    <a class="float-end" id="6_btn_up"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                    <a class="float-end" id="6_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-up"></i></a>
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div id="condicao_animal" style="display: none;">
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.planejamento.solicitante.condicoes_animais',['tipo'=>6,'id'=>$condicoes_animal->id,'status'=>$avaliacaoCondicoesAnimal->status])
                        @else
                            @include('solicitacao.planejamento.solicitante.condicoes_animais')
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_7">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="titulo" id="titulo_7">Procedimento
                                    <a class="float-end" id="7_btn_up"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                    <a class="float-end" id="7_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-up"></i></a>
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div id="procedimento" style="display: none; ">
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.planejamento.solicitante.procedimento',['tipo'=>7,'id'=>$procedimento->id,'status'=>$avaliacaoProcedimento->status])
                        @else
                            @include('solicitacao.planejamento.solicitante.procedimento',['tipo'=>7])
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_8">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="titulo" id="titulo_8">Cirurgia
                                    <a class="float-end" id="8_btn_up"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                    <a class="float-end" id="8_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-up"></i></a>
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div id="operacao" style="display: none; ">
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.planejamento.solicitante.operacao',['tipo'=>8,'id'=>$operacao->id,'status'=>$avaliacaoOperacao->status])
                        @else
                            @include('solicitacao.planejamento.solicitante.operacao')
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_9">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="titulo" id="titulo_9">Finalização
                                    <a class="float-end" id="9_btn_up"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                    <a class="float-end" id="9_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-up"></i></a>
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div id="eutanasia" style="display: none;">
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.planejamento.solicitante.eutanasia',['tipo'=>9,'id'=>$eutanasia->id,'status'=>$avaliacaoEutanasia->status])
                        @else
                            @include('solicitacao.planejamento.solicitante.eutanasia')
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_9">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="titulo" id="titulo_10">Resultado
                                    <a class="float-end" id="10_btn_up"><i
                                            class="fa-solid fa-circle-chevron-down"></i></a>
                                    <a class="float-end" id="10_btn_down" style="display: none"><i
                                            class="fa-solid fa-circle-chevron-up"></i></a>
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div id="resultado" style="display: none;">
                        @if(Auth::user()->hasRole('Solicitante') && 
                    </div>
                </div>


                <div class="row col-md-10 m-0">
                    <div class="col-4 pl-0">

                        <a type="button" class="btn btn-secondary w-100" href="{{ route('solicitacao.index', ['solicitacao_id' => $solicitacao->id]) }}">Voltar</a>

                    </div>
                </div>

                <!-- Utilizado para quando houver avaliação -->

                <!-- Modal Pendencia -->
                <div class="modal fade" id="pendenciaModal" tabindex="-1" role="dialog"
                     aria-labelledby="pendenciaModalLabel" aria-hidden="true">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="closeModal()">Fechar
                                    </button>
                                    @if(Auth::user()->hasRole('Avaliador'))
                                        <button type="button" class="btn btn-success" id="confirmPendencia">Confirmar
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('component.modal_success')

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var avaliado = {{ isset($avaliado) ? $avaliado : 'false' }};
                if (avaliado) {
                    var divsPai = document.querySelectorAll(".DivAporvado");
                    divsPai.forEach(function(divPai) {
                        divPai.innerHTML = "";
                    });
                }
            });
        </script>
        <script type="text/javascript">


            // Modelo animal
            $('#4_btn_up').on('click', function () {
                $('#modelo_animal').slideToggle(800);
                $(this).hide();
                $('#4_btn_down').show();
            });

            $('#4_btn_down').on('click', function () {
                $('#modelo_animal').slideToggle(800);
                $(this).hide();
                $('#4_btn_up').show();
            });

            // Planejamento
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

            // Condições Animal
            $('#6_btn_up').on('click', function () {
                $('#condicao_animal').slideToggle(800);
                $(this).hide();
                $('#6_btn_down').show();
            });

            $('#6_btn_down').on('click', function () {
                $('#condicao_animal').slideToggle(800);
                $(this).hide();
                $('#6_btn_up').show();
            });

            // Procedimento
            $('#7_btn_up').on('click', function () {
                $('#procedimento').slideToggle(800);
                $(this).hide();
                $('#7_btn_down').show();
            });

            $('#7_btn_down').on('click', function () {
                $('#procedimento').slideToggle(800);
                $(this).hide();
                $('#7_btn_up').show();
            });

            // Operação
            $('#8_btn_up').on('click', function () {
                $('#operacao').slideToggle(800);
                $(this).hide();
                $('#8_btn_down').show();
            });

            $('#8_btn_down').on('click', function () {
                $('#operacao').slideToggle(800);
                $(this).hide();
                $('#8_btn_up').show();
            });

            // Eutanasia
            $('#9_btn_up').on('click', function () {
                $('#eutanasia').slideToggle(800);
                $(this).hide();
                $('#9_btn_down').show();
            });

            $('#9_btn_down').on('click', function () {
                $('#eutanasia').slideToggle(800);
                $(this).hide();
                $('#9_btn_up').show();
            });

            // Resultado
            $('#10_btn_up').on('click', function () {
                $('#resultado').slideToggle(800);
                $(this).hide();
                $('#10_btn_down').show();
            });

            $('#10_btn_down').on('click', function () {
                $('#resultado').slideToggle(800);
                $(this).hide();
                $('#10_btn_up').show();
            });

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

                        ret += "<label for=\"parecer\" > Parecer:<strong style=\"color: red\">*</strong></label>";
                        if (data[0] != null) {
                            ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus required>" + data[0]['parecer'] + "</textarea>"
                            exist = data[0]['id'];
                        } else {
                            ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus></textarea>"
                        }

                        $("#trocaConteudo").append(ret);
                        $("#titulo_pendencia").append("Pendência(s) - " + data[1]);

                        @if(Auth::user()->hasRole('Avaliador'))
                        document.getElementById("confirmPendencia").setAttribute("onClick", "realizarAvaliacaoInd(" + tipo + "," + avaliacao_id + "," + id + ", '" + status + "')");
                        @endif

                        $("#pendenciaModal").modal('show');
                    }
                });
            }

            function closeModal() {
                $("#pendenciaModal").modal('hide');
            }




            function alterarCorCard(tipo, status) {
                if (status == "aprovado") {
                    $("#fundo_" + tipo).css({"background-color": "#38c172"});
                } else {
                    $("#fundo_" + tipo).css({"background-color": "#e3342f"});
                }
                $("#titulo_" + tipo).css({"color": "white"});
                $("#" + tipo + "_btn_up").css({"color": "white"});
                $("#" + tipo + "_btn_down").css({"color": "white"});
            }
        </script>

        <script>
            $(document).ready(function() {
                $('.download-button').click(function(e) {
                    e.preventDefault();
                    var downloadLink = $(this).attr('href');
                    var verifyLink = $(this).data('path');

                    $.ajax({
                        url: verifyLink,
                        method: 'GET',
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function (data) {
                            var a = document.createElement('a');
                            var url = window.URL.createObjectURL(data);
                            a.href = url;
                            a.download = 'arquivo.pdf';
                            document.body.append(a);
                            a.click();
                            a.remove();
                            window.URL.revokeObjectURL(url);
                        },
                        error: function (xhr, status) {

                            if (status == 'error') {
                                $('.modal').hide();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '');
                                $('body').css('overflow', '');
                                $('.modal-backdrop').remove();


                                $('#failModal').modal('show');
                                $('#failModal').find('.msg-fail').text('Arquivo não encontrado, é necessário solicitar o reenvio!');
                                setTimeout(function (){
                                    $('#failModal').modal('hide');

                                },2000)
                            }
                        }
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('input, textarea, select').on('input change', function() {
                    handleInputChange(this);
                });
            });

            function handleInputChange(input) {
                var form = $(input).closest('form');
                markSaved(form.find(':submit'), false);
            }

            function markSaved(button, saved) {
                if (saved) {
                    $(button).text('Salvo');
                    $(button).prop('disabled', true);
                    $(button).removeClass('btn-primary').addClass('btn-success');
                } else {
                    $(button).text('Salvar');
                    $(button).prop('disabled', false);
                    $(button).removeClass('btn-success').addClass('btn-primary');
                }
            }
        </script>
@endsection
