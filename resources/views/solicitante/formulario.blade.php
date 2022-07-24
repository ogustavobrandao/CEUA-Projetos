@extends('layouts.formulario')

@section('content')
    @if($solicitacao->estado_pagina == 0)
        @include('solicitacao.modelo_animal')
    @endif
@endsection
