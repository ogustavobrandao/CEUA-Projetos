@extends('layouts.formulario')

@section('content')
    @if($solicitacao->estado_pagina == 0)
        @include('solicitacao.solicitacao')
    @endif
@endsection
