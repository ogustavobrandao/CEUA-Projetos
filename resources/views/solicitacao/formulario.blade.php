@extends('layouts.formulario')

@section('content')
    <style>
        .cellNav {
            width: 8%;
            color: white;
        }

        .disabled {
            color: white !important;
        }
    </style>
    @if(isset($disabled))
        <div class="mb-4">
            @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.solicitacao')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.responsavel')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.colaborador')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.solicitacao_fim')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.modelo_animal')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.perfil')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.planejamento')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.condicoes_animais')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.procedimento')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.operacao')
        </div>
        <div class="mb-4">
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
            @include('solicitacao.eutanasia')
        </div>
        @if(Auth::user()->tipo_usuario_id == 2) <a type="button" class="pendencia btn btn-info" data-toggle="modal" data-target="#pendenciaModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a> @endif
        @include('solicitacao.resultado')
        @if(Auth::user()->tipo_usuario_id == 2)
            <div id="btn-avaliacao" class="row align-content-between mt-4">
                <div class="col-3">
                    <a class="btn btn-secondary w-100" href="">Voltar</a>
                </div>
                <div class="col-3">
                    <a id="reprovar" class="btn btn-danger w-100" data-toggle="modal" data-target="#reprovarModal">Reprovar</a>
                </div>
                <div class="col-3">
                    <a id="aprovarPendencia" class="btn btn-primary w-100" data-toggle="modal" data-target="#pendenciaModal" title="Pendência">Aprovar com pendência</a>
                </div>
                <div class="col-3">
                    <a id="aprovar" class="btn btn-success w-100" data-toggle="modal" data-target="#aprovarModal" title="Aprovar">Aprovar</a>
                </div>

            </div>


            <!-- Modal Reprovar -->
            <div class="modal fade" id="reprovarModal" tabindex="-1" role="dialog" aria-labelledby="reprovarModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reprovarModalLabel">Reprovar Solicitação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{route('avaliador.solicitacao.reprovar')}}">
                            @csrf
                            <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                            <input type="hidden" name="avaliador_id" value="{{Auth::user()->id}}">
                            <div class="modal-body">
                                <div class="col-sm-12 mt-2">
                                    <label for="parecer">Parecer:</label>
                                    <textarea class="form-control @error('parecer') is-invalid @enderror"
                                              id="parecerReprovacao" name="parecer" required autocomplete="parecer" autofocus style="height: 200px;">{{$avaliacao->parecer}}</textarea>
                                    @error('parecer')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-danger">Reprovar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Aprovar -->
            <div class="modal fade" id="aprovarModal" tabindex="-1" role="dialog" aria-labelledby="aprovarModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="avaliador_id" value="{{Auth::user()->id}}">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="inicio">Data de Início:</label>
                                        <input class="form-control @error('inicio') is-invalid @enderror" id="inicio" type="date" name="inicio"
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
                                        <label for="fim">Data de Fim:</label>
                                        <input class="form-control @error('fim') is-invalid @enderror" id="fim" type="date" name="fim"
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
                                <button type="submit" class="btn btn-success">Aprovar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Pendencia -->
            <div class="modal fade" id="pendenciaModal" tabindex="-1" role="dialog" aria-labelledby="pendenciaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reprovarModalLabel">Pendências da Solicitação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{route('avaliador.solicitacao.aprovarPendencia')}}">
                            @csrf
                            <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                            <input type="hidden" name="avaliador_id" value="{{Auth::user()->id}}">
                            <div class="modal-body">
                                <div class="col-sm-12 mt-2">
                                    <label for="parecer">Parecer:</label>
                                    <textarea class="form-control @error('parecer') is-invalid @enderror"
                                              id="parecerPendencia" name="parecer" required autocomplete="parecer" autofocus style="height: 200px;">{{$avaliacao->parecer}}</textarea>
                                    @error('parecer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-danger" id="cleanParecer">Limpar</button>
                                <button type="submit" class="btn btn-success" id="submitAprovacaoPendencia">Aprovar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endif
    @else
        @include('component.nav_formulario')
        @if($solicitacao->estado_pagina == 0)
            @include('solicitacao.solicitacao')
        @elseif($solicitacao->estado_pagina == 1)
            @include('solicitacao.responsavel')
        @elseif($solicitacao->estado_pagina == 2)
            @include('solicitacao.colaborador')
        @elseif($solicitacao->estado_pagina == 3)
            @include('solicitacao.solicitacao_fim')
        @endif

        @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
            <!-- Modal Pendencia -->
            <div class="modal fade" id="pendenciaVisuModal" tabindex="-1" role="dialog" aria-labelledby="pendenciaVisuModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reprovarModalLabel">Pendências da Solicitação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <div class="col-sm-12 mt-2">
                                    <label for="parecer">Parecer:</label>
                                    <textarea class="form-control" id="parecerPendenciaVisu" autofocus style="height: 200px;">{{$solicitacao->avaliacao->first()->parecer}}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                              </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if(isset($disabled))
        <script>
            @for($i = 0; $i < 12; $i++)
            $('#form{{$i}}').attr('action', 'numdeuné')
            $('#form{{$i}}').find('input, textarea, select, button').attr('disabled', 'disabled');
            @endfor

            $('#cleanParecer').click(function (){
                $('#parecerPendencia').val('');
            });

            $('#reprovar').click(function (){
                $('#parecerReprovacao').val($('#parecerPendencia').val());
            });

            $('.pendencia').click(function (){
                $('#submitAprovacaoPendencia').attr('hidden',true);
                $('#cleanParecer').removeAttr('hidden');
            });

            $('#aprovarPendencia').click(function (){
                $('#cleanParecer').attr('hidden',true);
                $('#submitAprovacaoPendencia').removeAttr('hidden');
            });

        </script>
    @endif
@endsection
