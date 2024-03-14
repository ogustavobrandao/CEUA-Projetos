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
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.solicitante.solicitacao',['tipo'=>0,'id'=>$solicitacao->id, 'status'=>$solicitacao->avaliacao_individual->status])
                        @else
                            @include('solicitacao.solicitante.solicitacao')
                        @endif
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
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.solicitante.responsavel',['tipo'=>1,'id'=>$solicitacao->responsavel->id, 'status'=>$solicitacao->responsavel->avaliacao_individual->status])
                        @else
                            @include('solicitacao.solicitante.responsavel')
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                        @include('solicitacao.colaborador.form_solicitante', ['solicitacao' => $solicitacao, 'status' => $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo',2)->first()->status,
                                 'tipo'=>2, 'id' => -1])
                    @else
                        @include('solicitacao.colaborador.form_solicitante', ['solicitacao' => $solicitacao])
                    @endif

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
                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.solicitante.solicitacao_fim',['tipo'=>3,'id'=>$solicitacao->dadosComplementares->id,'status'=>$solicitacao->dadosComplementares->avaliacao_individual->status])
                        @else
                            @include('solicitacao.solicitante.solicitacao_fim')
                        @endif

                    </div>
                </div>
            </div>

            <!-- Modal de Criação de Modelo Animal -->
            <div class="modal fade" id="modeloAnimalModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Modelo Animal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="form4" method="POST" action="{{route('solicitacao.modelo_animal.criar')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                @include('solicitacao.solicitante.modelo_animal_modal_solicitante')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success ">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="dados_solicitacao">
                <div class="mb-4">
                    <div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_4">
                        <div class="row">
                            <div class="col-md-12">
                                
                                    <h3 class="titulo" id="titulo_4">5. Dados dos Modelos Animais

                                        @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status != 'avaliado')
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
                                                <a class="btn btn-primary"
                                                    href="{{route('solicitacao.planejamento.index', ['modelo_animal_id' => $modelo_animal->id])}}">Abrir</a>
                                                @if(Auth::user()->hasRole('Solicitante') && $solicitacao->status != 'avaliado')
                                                    <a class="btn btn-danger btn-deletar-modelo-animal"
                                                        href="{{route('solicitacao.modelo_animal.delete', ['id' => $modelo_animal->id])}}">Deletar</a>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                        

                        {{-- Contagem de aprovados--}}
                        <input type="hidden" id="dadosInicaisAval" value="0">
                        <input type="hidden" id="dadosResponsavelAval" value="0">
                        <input type="hidden" id="dadosColaboradoAval" value="0">
                        <input type="hidden" id="dadosComplementaresAval" value="0">
                        <input type="hidden" id="dadosModeloAnimalAval" value="0">

                        <div class="row mt-4 row">
                            <div class="col-3">
                                
                                
                                    <a type="button" class="btn btn-secondary w-100"
                                       href="{{ route('solicitacao.solicitante.index') }}">Voltar</a>
                                
                            </div>
                            <div class="col-4 DivAporvado">
                               

                                @if(($solicitacao->status == null  ||
                                    ($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'))
                                    && (isset($solicitacao) && isset($solicitacao->responsavel) && count($solicitacao->modelosAnimais) > 0) )

                                    <a id="concluir-btn" class="btn w-100"
                                       href="#ModalConcluir"
                                       data-toggle="modal"
                                       style="border-color: #1d68a7; color: #1d68a7; background-color: #c0ddf6"
                                       title="Concluir Solicitação">Concluir Solicitação</a>

                                @else
                                    
                                    <button class="btn btn-secondary w-75" disabled>Concluir Solicitação</button>
                                    
                                @endif
                            </div>
                          

                        </div>
                </div>
            </div>

            <!-- Utilizado para quando houver avaliação -->

            <!-- Modal Pendencia -->
            <div class="modal fade" id="pendenciaModal" tabindex="-1" role="dialog"
                 aria-labelledby="pendenciaModalLabel"
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        onclick="closeModal()">
                                    Fechar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Modal de confirmação-->
    <div class="modal fade" id="ModalConcluir" tabindex="-1" role="dialog" aria-labelledby="Modal_confir"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalConfir">Confirmar Conclusão da Solicitação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body alert-danger">
                    <p>Após confirmação, não será possivel editar a solicitação até que seja avaliada, você tem certeza
                        que deseja concluir ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="{{ route('solicitacao.concluir', ['solicitacao_id' => $solicitacao->id]) }}"
                       class="btn btn-success">Confirmar</a>
                </div>
            </div>
        </div>
    </div>

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
    <script>

        //apagar depois
        // function atualizarTabela_modeloAnimal() {
        //     $.ajax({
        //         url: '/solicitacao/modelo_animal_tabela/' + {{$solicitacao->id}},
        //         method: 'GET',
        //         success: function(response) {
        //             $('#modelo_animal-info').html(response.html);
        //         },
        //         error: function(response) {

        //             console.log('Erro ao atualizar a tabela.');
        //         }
        //     });
        // }
        // $(document).ready(function() {
        //     atualizarTabela_modeloAnimal();
        // });

        // Contador para verificar aprovações da lista de modelos animais
        var contadorModelo = 0;

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

            // Colaborador
            @if(isset($avaliacaoColaborador) != null )
            alterarCorCard(2, '{{$avaliacaoColaborador->status}}');
            @endif

            // Dados Complementares
            @if(isset($avaliacaoDadosComp) != null )
            alterarCorCard(3, '{{$avaliacaoDadosComp->status}}');
            @endif

            //Modelo Animal
            @foreach($solicitacao->modelosAnimais as $modelo_animal)
            @if(isset($avaliacao))
            verificarAvalModelo('{{$modelo_animal->id}}', '{{$avaliacao->id}}');
            @endif
            @endforeach

        });


        // Dados Iniciais
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

        // Responsavel
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

        // Colaborador
        $('#2_btn_up').on('click', function () {
            $('#dados_colaborador').slideToggle(800);
            $(this).hide();
            $('#2_btn_down').show();
        });

        $('#2_btn_down').on('click', function () {
            $('#dados_colaborador').slideToggle(800);
            $(this).hide();
            $('#2_btn_up').show();
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

                    ret += "<label for=\"parecer\" > Parecer:<strong style=\"color: red\">*</strong> </label>";
                    if (data[0] != null) {
                        ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus required>" + data[0]['parecer'] + "</textarea>"
                        exist = data[0]['id'];
                    } else {
                        ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus></textarea>"
                    }

                    $("#trocaConteudo").append(ret);
                    $("#titulo_pendencia").append("Pendência(s) - " + data[1]);

                    

                    $("#pendenciaModal").modal('show');
                }
            });
        }

        function closeModal() {
            $("#pendenciaModal").modal('hide');
            $("#licencaModal").modal('hide');
        }


        function verificarAvalModelo(modelo, avaliacao) {
            $.ajax({
                url: '/avaliacao_individual/verificar/modelo/' + modelo + '/' + avaliacao,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    alterarCorList(modelo, data);
                }
            });
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
            // Modificar o contador geral para avaliação
            if (tipo != '4') {
                alterarContAval(tipo, status);
            }
        }

        function alterarCorList(id, status) {
            if (status == "aprovado") {
                $("#fundo_modelo_" + id).css({"background-color": "#38c172", "color": "white"});
                contadorModelo += 1;
            } else if (status == "reprovado") {
                $("#fundo_modelo_" + id).css({"background-color": "#e3342f", "color": "white"});
                contadorModelo = 0;
            } else {
                contadorModelo = 0;
            }
            alterarContAval(4, status);
        }

        function alterarContAval(tipo, status) {
            var marc = 0;
            if (status == "aprovado") {
                marc = 1;
            }
            if (tipo == '0') {
                $("#dadosInicaisAval").val(marc);
            } else if (tipo == '1') {
                $("#dadosResponsavelAval").val(marc);
            } else if (tipo == '2') {
                $("#dadosColaboradoAval").val(marc);
            } else if (tipo == '3') {
                $("#dadosComplementaresAval").val(marc);
            } else if (tipo == '4' && contadorModelo == {{count($solicitacao->modelosAnimais)}}) {
                $("#dadosModeloAnimalAval").val(1);
                alterarCorCard(tipo, 'aprovado');
            } else if (tipo == '4' && contadorModelo != {{count($solicitacao->modelosAnimais)}}) {
                $("#dadosModeloAnimalAval").val(0);
                alterarCorCard(tipo, 'reprovado');
            }
            statusAvaliacao();
        }

        function statusAvaliacao() {
            if ($("#dadosInicaisAval").val() == '1' && $("#dadosResponsavelAval").val() == '1' && $("#dadosColaboradoAval").val() == '1'
                && $("#dadosComplementaresAval").val() == '1' && $("#dadosModeloAnimalAval").val() == '1') {
                $("#reprovarAvaliacao").attr("hidden", true);
                $("#pendenciaAvaliacao").attr("hidden", true);
                $("#aprovarAvaliacao").removeAttr("hidden");
            } else {
                $("#reprovarAvaliacao").removeAttr("hidden");
                $("#pendenciaAvaliacao").removeAttr("hidden");
                $("#aprovarAvaliacao").attr("hidden", true);
            }
        }

     

        function limparFormulario() {
            $('#modeloAnimalModal').find('input:not([name="solicitacao_id"]):not([name="_token"]):not([name="geneticamente_modificado"]), textarea').val('');
            $('#modeloAnimalModal').find('.default').prop('selected', true);
            $('#modeloAnimalModal').find('.default').prop('checked', true);
            $('#anexo_cqb').hide();
            $("#anexo_outro_tipo, #anexo_outra_procedencia, #anexo_outro_tipo, #anexo_animal_silvestre_captura, #anexo_animal_silvestre_coleta, #anexo_animal_marcacao, #anexo_outras_informações")
                .hide().find('input, radio').prop('disabled', true);
        }

        function fecharModal() {
            $('.modal').hide();
            $('body').removeClass('modal-open');
            $('body').css('padding-right', '');
            $('.modal-backdrop').remove();
        }

        $(document).on('click', '.btn-deletar-modelo-animal', function (event) {
            event.preventDefault();

            var scrollPosition = window.scrollY;

            var url = $(this).attr('href');
            var csrfToken = '{{ csrf_token() }}';

            var confirmacao = confirm('Você tem certeza que deseja apagar?');

            if (confirmacao) {
                var form = $('<form>', {
                    'method': 'POST',
                    'action': url,
                    'style': 'display: none;'
                });

                form.append($('<input>', {
                    'name': '_token',
                    'value': csrfToken,
                    'type': 'hidden'
                }));

                form.append($('<input>', {
                    'name': '_method',
                    'value': 'DELETE',
                    'type': 'hidden'
                }));

                $('body').append(form);

                form.submit();
            }

            localStorage.setItem('scrollPosition', scrollPosition);
        });

        var scrollPosition = parseInt(localStorage.getItem('scrollPosition')) || 0;

        window.scrollTo(0, scrollPosition);

        localStorage.removeItem('scrollPosition');


    </script>
@endsection
