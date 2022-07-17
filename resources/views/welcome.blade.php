@extends('layouts.home')
@section('login')
    <div class="container-fluid my-4 ">
        <div class="row align-items-center borda-bottom" >
            <div class="col-sm-7">
                <div class="row" style="text-align: justify;">
                    <h1>
                        Comitê de Ética no Uso de Animais
                    </h1>
                    <p>
                        A CEUA tem como objetivo deliberar sobre a aprovação ou não de projetos de pesquisa para estudos que versem sobre mecanismos de doença e tratamento em câncer, nos quais sejam
                        utilizados protocolos experimentais com animais
                    </p>
                </div>
                <div class="row mt-2">
                    <div class="col-md-5">
                        <a class="btn w-100" href="{{route('login')}}" style="background-color: #143BC2; color: white; border-radius: 10px">Entrar</a>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <a class="btn w-100" href="{{ route('register') }}" style="background-color: white; color: #143BC2; border: 2px solid #143BC2; border-radius: 10px">Cadastre-se</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <div class="mb-4" style="background-color: #718096; width: 100%; height: 360px; margin-right: 5px">
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-3">
                <div class="mb-2" style="background-color: #718096; width: 100%; height: 260px; margin-right: 5px">

                </div>
            </div>
            <div class="col"></div>
            <div class="col-md-3">
                <div class="mb-2" style="background-color: #718096; width: 100%; height: 260px; margin-right: 5px">

                </div>
            </div>
            <div class="col"></div>
            <div class="col-md-3" style="margin-right: 0px">
                <div class="mb-2" style="background-color: #718096; width: 100%; height: 260px; margin-right: 5px">

                </div>
            </div>
        </div>

        <div class="row align-items-center my-4">
            <div class="col"></div>
            <div class="col-md-3">
                <div class="mb-2" style="background-color: #718096; width: 100%; height: 260px; margin-right: 5px">

                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="mb-2" style="background-color: #718096; width: 100%; height: 260px; margin-right: 5px">

                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
