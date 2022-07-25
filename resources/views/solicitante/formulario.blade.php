@extends('layouts.formulario')

@section('content')
    @if($solicitacao->estado_pagina == 0)
        @include('solicitacao.responsavel')
    @elseif($solicitacao->estado_pagina == 1)
        @include('solicitacao.colaborador')
    @else
    @include('solicitacao.eutanasia')
    @endif
@endsection
