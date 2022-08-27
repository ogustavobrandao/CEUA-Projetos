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
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.solicitacao')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.responsavel')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.colaborador')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.solicitacao_fim')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.modelo_animal')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.perfil')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.planejamento')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.condicoes_animais')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.procedimento')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.operacao')
        </div>
        <div class="mb-4">
            <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
            @include('solicitacao.eutanasia')
        </div>
        <button class="btn btn-primary w-25 pendencia" data-toggle="modal" data-target="#pendenciaModal">Pendência</button>
        @include('solicitacao.resultado')
        @if(Auth::user()->tipo_usuario_id == 2)
            <div id="btn-avaliacao" class="row align-content-between mt-4">
                <div class="col-3">
                    <a class="btn btn-secondary w-100" href="#">Voltar</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-danger w-100" data-toggle="modal" data-target="#reprovarModal">Reprovar</a>
                </div>
                <div class="col-3">
                    <a id="aprovarPendencia" class="btn btn-primary w-100" data-toggle="modal" data-target="#pendenciaModal">Aprovar com pendência</a>
                </div>
                <div class="col-3">
                    <form id="formAvaliacao" method="POST" action="{{route('avaliador.solicitacao.aprovar')}}">
                        @csrf
                        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                        <input type="hidden" name="avaliador_id" value="{{Auth::user()->id}}">
                        <button type="submit" id="aprovar" class="btn btn-success w-100">Aprovar</button>
                    </form>
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
                                              id="parecerReprovacao" name="parecer" required autocomplete="parecer" autofocus style="height: 200px;"></textarea>
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
                        <form method="POST" action="{{route('avaliador.solicitacao.reprovar')}}">
                            @csrf
                            <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                            <input type="hidden" name="avaliador_id" value="{{Auth::user()->id}}">
                            <div class="modal-body">
                                <div class="col-sm-12 mt-2">
                                    <label for="parecer">Parecer:</label>
                                    <textarea class="form-control @error('parecer') is-invalid @enderror"
                                              id="parecerPendencia" name="parecer" required autocomplete="parecer" autofocus style="height: 200px;"></textarea>
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
        @elseif($solicitacao->estado_pagina == 4)
            @include('solicitacao.modelo_animal')
        @elseif($solicitacao->estado_pagina == 5)
            @include('solicitacao.perfil')
        @elseif($solicitacao->estado_pagina == 6)
            @include('solicitacao.planejamento')
        @elseif($solicitacao->estado_pagina == 7)
            @include('solicitacao.condicoes_animais')
        @elseif($solicitacao->estado_pagina == 8)
            @include('solicitacao.procedimento')
        @elseif($solicitacao->estado_pagina == 9)
            @include('solicitacao.operacao')
        @elseif($solicitacao->estado_pagina == 10)
            @include('solicitacao.eutanasia')
        @elseif($solicitacao->estado_pagina == 11)
            @include('solicitacao.resultado')
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

            $('.fon').click(function (){
                $('#parecerPendencia').val('');
            });

        </script>
    @endif
@endsection
