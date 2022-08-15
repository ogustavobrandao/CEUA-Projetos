@extends('layouts.formulario')

@section('content')
    <style>
        .cellNav {
            width: 8%;
            color: white;
        }

        .disabled
        {
            color: white !important;
        }
    </style>
    @if(isset($disabled))
        <div class="mb-4">
            @include('solicitacao.solicitacao')
        </div>
        <div class="mb-4">
            @include('solicitacao.responsavel')
        </div>
        <div class="mb-4">
            @include('solicitacao.colaborador')
        </div>
        <div class="mb-4">
            @include('solicitacao.solicitacao_fim')
        </div>
        <div class="mb-4">
            @include('solicitacao.modelo_animal')
        </div>
        <div class="mb-4">
            @include('solicitacao.perfil')
        </div>
        <div class="mb-4">
            @include('solicitacao.planejamento')
        </div>
        <div class="mb-4">
            @include('solicitacao.condicoes_animais')
        </div>
        <div class="mb-4">
            @include('solicitacao.procedimento')
        </div>
        <div class="mb-4">
            @include('solicitacao.operacao')
        </div>
        <div class="mb-4">
            @include('solicitacao.eutanasia')
        </div>
        @include('solicitacao.resultado')
        @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
            <div id="btn-avaliacao" class="row align-content-between mt-4">
                <div class="col-4">
                    <a class="btn btn-secondary w-100" href="#">Voltar</a>
                </div>
                <div class="col-4">
                    <a class="btn btn-danger w-100" data-toggle="modal" data-target="#reprovarModal">Reprovar</a>
                </div>
                <div class="col-4">
                    <form method="POST" action="{{route('avaliador.solicitacao.aprovar')}}">
                        @csrf
                        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                        <button type="submit" class="btn btn-success w-100">Aprovar</button>
                    </form>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="reprovarModal" tabindex="-1" role="dialog" aria-labelledby="reprovarModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
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
                            <div class="modal-body">
                                <div class="col-sm-12 mt-2">
                                    <label for="parecer">Parecer:</label>
                                    <textarea class="form-control @error('parecer') is-invalid @enderror" id="parecer" name="parecer" required autocomplete="parecer"
                                              autofocus></textarea>
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
        @endif

    @elseif($solicitacao->estado_pagina == 0)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info active cellNav" href="#">1</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">2</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">3</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">4</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">5</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">6</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">7</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.solicitacao')
    @elseif($solicitacao->estado_pagina == 1)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info active cellNav" href="#">2</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">3</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">4</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">5</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">6</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">7</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.responsavel')
    @elseif($solicitacao->estado_pagina == 2)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info active cellNav" href="#">3</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">4</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">5</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">6</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">7</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.colaborador')
    @elseif($solicitacao->estado_pagina == 3)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info active cellNav" href="#">4</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">5</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">6</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">7</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.solicitacao_fim')
    @elseif($solicitacao->estado_pagina == 4)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info active cellNav" href="#">5</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">6</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">7</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.modelo_animal')
    @elseif($solicitacao->estado_pagina == 5)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 4])}}">5</a>
            <a class="nav-link btn btn-info active cellNav" href="#">6</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">7</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.perfil')
    @elseif($solicitacao->estado_pagina == 6)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 4])}}">5</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 5])}}">6</a>
            <a class="nav-link btn btn-info active cellNav" href="#">7</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.planejamento')
    @elseif($solicitacao->estado_pagina == 7)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 4])}}">5</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 5])}}">6</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 6])}}">7</a>
            <a class="nav-link btn btn-info active cellNav" href="#">8</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.condicoes_animais')
    @elseif($solicitacao->estado_pagina == 8)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 4])}}">5</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 5])}}">6</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 6])}}">7</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 7])}}">8</a>
            <a class="nav-link btn btn-info active cellNav" href="#">9</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.procedimento')
    @elseif($solicitacao->estado_pagina == 9)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 4])}}">5</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 5])}}">6</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 6])}}">7</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 7])}}">8</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 8])}}">9</a>
            <a class="nav-link btn btn-info active cellNav" href="#">10</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.operacao')
    @elseif($solicitacao->estado_pagina == 10)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 4])}}">5</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 5])}}">6</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 6])}}">7</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 7])}}">8</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 8])}}">9</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 9])}}">10</a>
            <a class="nav-link btn btn-info active cellNav" href="#">11</a>
            <a class="nav-link btn btn-secondary disabled cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.eutanasia')
    @elseif($solicitacao->estado_pagina == 11)
        <nav class="nav w-100 justify-content-between mb-2">
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 4])}}">5</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 5])}}">6</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 6])}}">7</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 7])}}">8</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 8])}}">9</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 9])}}">10</a>
            <a class="nav-link btn btn-info cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 10])}}">11</a>
            <a class="nav-link btn btn-info active cellNav" href="#">12</a>
        </nav>
        @include('solicitacao.resultado')
    @endif

    @if(isset($disabled))
        <script>
            @for($i = 0; $i < 12; $i++)
            $('#form{{$i}}').attr('action', 'numdeuné')
            $('#form{{$i}}').find('input, textarea, select, button').attr('disabled', 'disabled');
            @endfor
        </script>
    @endif
@endsection
