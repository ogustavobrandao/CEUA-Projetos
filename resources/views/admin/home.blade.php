@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="border-bottom: #131833 2px solid">
            <span class="titulo text-center">Serviços</span>
        </div>
    </div>

    <div class="container text-center">
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <a href="{{ route('instituicao.index') }}">
                    <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable"
                        style="background-color: #131833">
                        <div class="pt-4">
                            <img class="pb-3" src="../images/vertical_split.svg" height="120px">
                            <div class="text-center align-middle">
                                <div class="textoCaixa">Instituições</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a href="{{ route('solicitacao.admin.index') }}">
                    <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable"
                        style="background-color: #143BC2;">
                        <div class="pt-4">
                            <img class="pb-3" src="../images/vertical_split.svg" height="120px">
                            <div style="color: white" class="textoCaixa w-100">Solicitações</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a href="{{ route('usuarios.index') }}">
                    <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable"
                        style="background-color: #143BC2;">
                        <div class="pt-4">
                            <img class="pb-3" src="../images/vertical_split.svg" height="120px">
                            <div style="color: white" class="textoCaixa w-100">Usuários</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
