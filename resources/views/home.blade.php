@extends('layouts.app')

@section('content')
    @if(Auth::user()->hasRole('Solicitante'))
        @include('solicitante.home')
    @elseif(Auth::user()->hasRole('Avaliador'))
        @include('avaliador.home')
    @endif

@endsection
