@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 3)
        @include('solicitante.home')
    @endif
@endsection
