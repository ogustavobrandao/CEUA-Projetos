@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">Escolha o Perfil</span>
    </div>
</div>

<div class="container text-center">
    <div class="row justify-content-center mt-5">
        @if (auth()->user()->hasRole('Administrador'))
            <div class="col-4">
                <a href="{{route('perfil_adm')}}">
                    <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable" style="background-color: #6b1111;">
                        <div class="pt-4">
                            <img class="pb-3" src="images/vertical_split.svg" height="120px">
                        </div>
                        <div class="text-center">
                            <div style="color: white" class="textoCaixa">Administrador</div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        @if (auth()->user()->hasRole('Avaliador'))
            <div class="col-4">
                <a href="{{route('perfil_avaliador')}}">
                    <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable" style="background-color: #941717;">
                        <div class="pt-4">
                            <img class="pb-3" src="images/vertical_split.svg" height="120px">
                        </div>
                        <div class="text-center">
                            <div style="color: white" class="textoCaixa">Avaliador</div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        @if (auth()->user()->hasRole('Solicitante'))
            <div class="col-4">
                <a href="{{route('perfil_solicitante')}}">
                    <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable" style="background-color: #6b1111;">
                        <div class="pt-4">
                            <img class="pb-3" src="images/vertical_split.svg" height="120px">
                        </div>
                        <div class="text-center">
                            <div style="color: white" class="textoCaixa">Solicitante</div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
</div>

@endsection
