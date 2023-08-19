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
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_0">1. Dados Iniciais <strong
                                            style="color: red">*</strong>
                                        <a class="float-end" id="0_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="0_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                    <div class="linha"></div>
                                @else
                                    <h2 class="titulo" id="titulo_0">1. Dados Iniciais
                                        <a class="float-end" id="0_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="0_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('component.modal_fail')
                    <div id="dados_iniciais">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.solicitacao',['tipo'=>0,'avaliacao_id'=>$avaliacao->id,'id'=>$solicitacao->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.solicitacao',['tipo'=>0,'id'=>$solicitacao->id, 'status'=>$solicitacao->avaliacao_individual->status])
                        @else
                            @include('solicitacao.solicitacao')
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    <div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_1">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_1">2. Dados do Responsável <strong style="color: red">*</strong>
                                        <a class="float-end" id="1_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="1_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_1">2. Dados do Responsável
                                        <a class="float-end" id="1_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="1_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div id="dados_responsavel">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.responsavel',['tipo'=>1,'avaliacao_id'=>$avaliacao->id,'id'=>$responsavel->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.responsavel',['tipo'=>1,'id'=>$solicitacao->responsavel->id, 'status'=>$solicitacao->responsavel->avaliacao_individual->status])
                        @else
                            @include('solicitacao.responsavel')
                        @endif

                    </div>
                </div>
                <div class="mb-4">
                    @if(Auth::user()->tipo_usuario_id == 2)
                        @include('solicitacao.colaborador.form', ['avaliacao_id' => $avaliacao->id, 'solicitacao' => $solicitacao, 'avaliacao' => $avaliacao, 'tipo'
                                => 2, 'id' => -1])
                    @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                        @include('solicitacao.colaborador.form', ['solicitacao' => $solicitacao, 'status' => $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo',2)->first()->status,
                                 'tipo'=>2, 'id' => -1])
                    @else
                        @include('solicitacao.colaborador.form', ['solicitacao' => $solicitacao])
                    @endif

                </div>
                <div class="mb-4">
                    <div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_3">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_3">4. Dados Complementares <strong style="color: red">*</strong>
                                        <a class="float-end" id="3_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="3_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_3">4. Dados Complementares
                                        <a class="float-end" id="3_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="3_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div id="dados_complementares">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.solicitacao_fim',['tipo'=>3,'avaliacao_id'=>$avaliacao->id,'id'=>$solicitacao->dadosComplementares->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.solicitacao_fim',['tipo'=>3,'id'=>$solicitacao->dadosComplementares->id,'status'=>$solicitacao->dadosComplementares->avaliacao_individual->status])
                        @else
                            @include('solicitacao.solicitacao_fim')
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
                        <form id="form4" method="POST" action="javascript:void(0)"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                @include('solicitacao.modelo_animal_modal')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success btn-salvar-modelo_animal">Cadastrar</button>
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
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h3 class="titulo" id="titulo_4">5. Dados dos Modelos Animais <strong
                                            style="color: white">*</strong>

                                        @if(Auth::user()->tipo_usuario_id == 3  && $solicitacao->status != 'avaliado')
                                            <a class="float-end "
                                               data-toggle="modal"
                                               data-target="#modeloAnimalModal"
                                               style="color: green"
                                               title="Adicionar Modelo Animal"><i
                                                    class="fa-solid fa-circle-plus fa-2xl"></i></a></h3>
                                @endif
                                @else
                                    <h3 class="titulo" id="titulo_4">5. Dados dos Modelos Animais

                                        @if(Auth::user()->tipo_usuario_id == 3  && $solicitacao->status != 'avaliado')
                                            <a class="float-end "
                                               data-toggle="modal"
                                               data-target="#modeloAnimalModal"
                                               style="color: green"
                                               title="Adicionar Modelo Animal"><i
                                                    class="fa-solid fa-circle-plus fa-2xl"></i></a></h3>
                                @endif

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
                                </tbody>
                            </table>

                            @endif
                        </div>

                        {{-- Contagem de aprovados--}}
                        <input type="hidden" id="dadosInicaisAval" value="0">
                        <input type="hidden" id="dadosResponsavelAval" value="0">
                        <input type="hidden" id="dadosColaboradoAval" value="0">
                        <input type="hidden" id="dadosComplementaresAval" value="0">
                        <input type="hidden" id="dadosModeloAnimalAval" value="0">

                        <div class="row mt-4 row">
                            <div class="col-3">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <a type="button" class="btn btn-secondary w-100"
                                       href="{{ route('solicitacao.avaliador.index') }}">Voltar</a>
                                @elseif(Auth::user()->tipo_usuario_id == 3)
                                    <a type="button" class="btn btn-secondary w-100"
                                       href="{{ route('solicitacao.solicitante.index') }}">Voltar</a>
                                @elseif(Auth::user()->tipo_usuario_id == 1)
                                    <a type="button" class="btn btn-secondary w-100"
                                       href="{{ route('solicitacao.admin.index') }}">Voltar</a>
                                @endif
                            </div>
                            <div class="col-4 DivAporvado">
                                @if(Auth::user()->tipo_usuario_id == 1)
                                        {{-- Aprovar Solicitação --}}
                                        <a type="button" class="btn w-100 btn-success"
                                           data-toggle="modal" data-target="#aprovarModal"
                                           title="Aprovar Solicitação." id="aprovarAvaliacao">Aprovar</a>

                                @elseif(Auth::user()->tipo_usuario_id == 2)
                                    {{-- Aprovar Solicitação --}}
                                    <form method="POST" action="{{route('avaliador.solicitacao.aprovar')}}">
                                        @csrf
                                        <input type="hidden" name="avaliacao_id" value="{{$avaliacao->id}}">
                                        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                        <button type="submit"  class="btn w-100 btn-success font-weight-bold"
                                                title="Aprovar Solicitação Com Pendências."
                                                id="aprovarAvaliacao">Aprovar
                                        </button>
                                    </form>
                                    {{-- Reprovar Solicitação--}}
                                    <form method="POST" action="{{route('avaliador.solicitacao.aprovarPendencia')}}">
                                        @csrf
                                        <input type="hidden" name="avaliacao_id" value="{{$avaliacao->id}}">
                                        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                        <button type="submit" class="btn w-100 bnt-pendencia font-weight-bold"
                                                title="Aprovar Solicitação Com Pendências."
                                                id="pendenciaAvaliacao">Aprovar com pendências
                                        </button>
                                    </form>
                                @endif

                                @if(($solicitacao->status == null  ||
                                    ($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'))
                                    && (isset($solicitacao) && isset($solicitacao->responsavel) && count($solicitacao->modelosAnimais) > 0) )

                                    <a id="concluir-btn" class="btn w-100"
                                       href="#ModalConcluir"
                                       data-toggle="modal"
                                       style="border-color: #1d68a7; color: #1d68a7; background-color: #c0ddf6"
                                       title="Concluir Solicitação">Concluir Solicitação</a>

                                @else
                                    @if(Auth::user()->tipo_usuario_id != 2 && Auth::user()->tipo_usuario_id != 1)
                                        <button class="btn btn-secondary w-75" disabled>Concluir Solicitação</button>
                                    @endif
                                @endif
                            </div>
                            <div class="col-3 DivAporvado">
                                @if(Auth::user()->tipo_usuario_id == 1)
                                    {{-- Reprovar Solicitação--}}
                                    <form method="POST" action="{{route('avaliador.solicitacao.reprovar')}}">
                                        @csrf
                                        <input type="hidden" name="avaliacao_id" value="{{$avaliacao->id}}">
                                        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                        <button type="submit" class="btn w-75 btn-danger font-weight-bold"
                                                title="Reprovar Solicitação."
                                                id="repovar">Reprovar
                                        </button>
                                    </form>
                                    @elseif(Auth::user()->tipo_usuario_id == 2)
                                        {{-- Reprovar Solicitação--}}
                                        <form method="POST" action="{{route('avaliador.solicitacao.reprovar')}}">
                                            @csrf
                                            <input type="hidden" name="avaliacao_id" value="{{$avaliacao->id}}">
                                            <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                            <button type="submit" class="btn w-75 btn-danger font-weight-bold"
                                                    title="Reprovar Solicitação."
                                                    id="reprovarAvaliacao">Reprovar
                                            </button>
                                        </form>
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
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <button type="button" class="btn btn-success" id="confirmPendencia">Confirmar
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(Auth::user()->tipo_usuario_id == 1)
                <!-- Modal Aprovar -->
                <div class="modal fade" id="aprovarModal" tabindex="-1" role="dialog"
                     aria-labelledby="aprovarModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="aprovarModalLabel">Período da licença</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{route('avaliador.solicitacao.aprovar')}}">
                                @csrf
                                <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                <input type="hidden" name="avaliacao_id" value="{{$avaliacao->id}}">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="inicio">Data de Início:<strong
                                                    style="color: red">*</strong></label>
                                            <input class="form-control @error('inicio') is-invalid @enderror"
                                                   id="inicio"
                                                   type="date" name="inicio"
                                                   value="{{date('Y-m-d', strtotime($solicitacao->inicio))}}"
                                                   required autocomplete="inicio" autofocus>
                                            @error('inicio')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-5">
                                            <label for="fim">Data de Fim:<strong style="color: red">*</strong></label>
                                            <input class="form-control @error('fim') is-invalid @enderror" id="fim"
                                                   type="date"
                                                   name="fim"
                                                   value="{{date('Y-m-d', strtotime($solicitacao->fim))}}"
                                                   required autocomplete="fim" autofocus>
                                            @error('fim')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-success">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
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


        function atualizarTabela_modeloAnimal() {
            $.ajax({
                url: '/solicitacao/modelo_animal_tabela/' + {{$solicitacao->id}},
                method: 'GET',
                success: function(response) {
                    $('#modelo_animal-info').html(response.html);
                },
                error: function(response) {

                    console.log('Erro ao atualizar a tabela.');
                }
            });
        }
        $(document).ready(function() {
            atualizarTabela_modeloAnimal();
        });

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

                    @if(Auth::user()->tipo_usuario_id == 2)
                    document.getElementById("confirmPendencia").setAttribute("onClick", "realizarAvaliacaoInd(" + tipo + "," + avaliacao_id + "," + id + ", '" + status + "')");
                    @endif

                    $("#pendenciaModal").modal('show');
                }
            });
        }

        function closeModal() {
            $("#pendenciaModal").modal('hide');
            $("#licencaModal").modal('hide');
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

        $(document).on('click', '.btn-salvar-modelo_animal', function (event) {
            event.preventDefault();

            var form = $('#form4')[0];
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: '{{ route('solicitacao.modelo_animal.criar') }}',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function (response) {
                    var message = response.message;

                    if (message == 'success') {
                        atualizarTabela_modeloAnimal();
                        $('#modeloAnimalModal').find
                        ('input:not([name="solicitacao_id"]):not([name="_token"]):not([name="geneticamente_modificado"]), textarea').val('');
                        $('#modeloAnimalModal').find('.default').prop('selected', true);
                        $('#modeloAnimalModal').find('.default').prop('checked', true);
                        $('#anexo_cqb').hide();
                        $("#anexo_outro_tipo").hide();
                        $("#anexo_outra_procedencia").hide().find('input, radio').prop('disabled', true);
                        $("#anexo_outro_tipo").hide().find('input, radio').prop('disabled', true);
                        $("#anexo_animal_silvestre_captura").hide().find('input, radio').prop('disabled', true);
                        $("#anexo_animal_silvestre_coleta").hide().find('input, radio').prop('disabled', true);
                        $("#anexo_animal_marcacao").hide().find('input, radio').prop('disabled', true);
                        $("#anexo_outras_informações").hide().find('input, radio').prop('disabled', true);


                        $('.modal').hide();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $('.modal-backdrop').remove();
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        $('.div_error').css('display', 'none');
                        var errors = xhr.responseJSON.errors;
                        var statusCode = xhr.status;
                        if (statusCode == 422 && status == 'error') {
                            for (var field in errors) {
                                var fieldErrors = errors[field];
                                var errorMessage = '';
                                for (var i = 0; i < fieldErrors.length; i++) {
                                    errorMessage += fieldErrors[i] + '\n';
                                }
                                var errorDiv = '#' + field + '_error';
                                var errorMessageTag = '#' + field + '_error_message';
                                $(errorMessageTag).html(errorMessage);
                                $(errorDiv).css('display', 'block');
                            }
                        }
                    } else {
                        alert("Erro na requisição Ajax: " + error);
                    }
                }
            });

            return false;
        });

        $(document).on('click', '.btn-deletar-modelo-animal', function (event) {
            event.preventDefault();

            var url = $(this).attr('href');
            var csrfToken = '{{ csrf_token() }}';

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: csrfToken,
                    _method: 'GET',
                },
                dataType: 'json',
                success: function (response) {
                    var message = response.message;
                    if (message == 'success') {
                        atualizarTabela_modeloAnimal();
                    }
                },
                error: function (xhr, status, error) {
                    alert("Erro na requisição Ajax: " + error);
                }
            });

            return false;
        });

    </script>
@endsection
