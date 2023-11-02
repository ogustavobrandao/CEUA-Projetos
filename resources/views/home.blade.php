@extends('layouts.app')

@section('content')
    @if(Auth::user()->hasRole('Solicitante') && $id == 3)
        @include('solicitante.home')
    @elseif(Auth::user()->hasRole('Avaliador') &&  $id == 2)
        @include('avaliador.home')
    @endif

@endsection
