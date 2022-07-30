@extends('layouts.formulario')

@section('content')
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
    @elseif($solicitacao->estado_pagina == 0)
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

    @if(isset($disabled))
        <script>
            $('form').attr('action', 'numdeuné')
            $('form').find('input, textarea, select, button').attr('disabled', 'disabled');
        </script>
    @endif
@endsection
