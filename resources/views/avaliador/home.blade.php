@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="border-bottom: #131833 2px solid">
            <span class="titulo text-center">Avaliações</span>
        </div>
    </div>

    <div class="container text-center">
        <div class="row justify-content-center mt-5">
            <div class="col-10">
                <div class="row justify-content-center">
                    <div class="col-5 d-flex justify-content-center">
                        <a href="{{ route('solicitacao.avaliador.index') }}">
                            <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable"
                                style="background-color: #143BC2;">
                                <div class="pt-4">
                                    <img class="pb-3" src="../images/vertical_split.svg" height="120px">
                                </div>
                                <div class="text-center">
                                    <div style="color: white" class="textoCaixa">Minhas Avaliações</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
