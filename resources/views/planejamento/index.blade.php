@extends('layouts.formulario')

@section('content')
    @error('planejamento_id')
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @enderror
    <h2 class="titulo_h2" id="expand_dados_solicitacao"><span class="titulo_spam">Planejamento</span></h2>
    <div id="dados_solicitacao" class="col-md-10 my-2">
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Dados Base
                            <a class="float-end" id="planejamento_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="planejamento_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="planejamento">
                @include('solicitacao.planejamento')
            </div>
        </div>

    </div>

    <h2 class="titulo_h2" id="expand_dados_solicitacao"><span class="titulo_spam">Componentes Conjuntos ao Planejamento</span></h2>

    <div id="dados_solicitacao2" class="col-md-10 my-2">
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Condição Animal
                            <a class="float-end" id="condicao_animal_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="condicao_animal_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="condicao_animal" style="display: none;">
                @include('solicitacao.condicoes_animais')
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Procedimento
                            <a class="float-end" id="procedimento_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="procedimento_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="procedimento" style="display: none;">
                @include('solicitacao.procedimento')
            </div>
        </div>
        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Operação
                                <a class="float-end" id="operacao_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                <a class="float-end" id="operacao_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="operacao" style="display: none;">
                @include('solicitacao.operacao')
            </div>
        </div>

        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Eutanasia
                            <a class="float-end" id="eutanasia_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="eutanasia_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="eutanasia" style="display: none;">
                @include('solicitacao.eutanasia')
            </div>
        </div>

        <div class="mb-4">
            <div class="card shadow-lg p-3 bg-white borda-bottom" style="border-radius: 10px 10px 0px 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo">Resultado
                            <a class="float-end" id="resultado_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                            <a class="float-end" id="resultado_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="resultado" style="display: none;">
                @include('solicitacao.resultado')
            </div>
        </div>

    </div>


    <script type="text/javascript">

        $('#planejamento_btn_up').on('click', function () {
            $('#planejamento').slideToggle(800);
            $(this).hide();
            $('#planejamento_btn_down').show();
        });

        $('#planejamento_btn_down').on('click', function () {
            $('#planejamento').slideToggle(800);
            $(this).hide();
            $('#planejamento_btn_up').show();
        });

        $('#condicao_animal_btn_up').on('click', function () {
            $('#condicao_animal').slideToggle(800);
            $(this).hide();
            $('#condicao_animal_btn_down').show();
        });

        $('#condicao_animal_btn_down').on('click', function () {
            $('#condicao_animal').slideToggle(800);
            $(this).hide();
            $('#condicao_animal_btn_up').show();
        });

        $('#procedimento_btn_up').on('click', function () {
            $('#procedimento').slideToggle(800);
            $(this).hide();
            $('#procedimento_btn_down').show();
        });

        $('#procedimento_btn_down').on('click', function () {
            $('#procedimento').slideToggle(800);
            $(this).hide();
            $('#procedimento_btn_up').show();
        });

        $('#operacao_btn_up').on('click', function () {
            $('#operacao').slideToggle(800);
            $(this).hide();
            $('#operacao_btn_down').show();
        });

        $('#operacao_btn_down').on('click', function () {
            $('#operacao').slideToggle(800);
            $(this).hide();
            $('#operacao_btn_up').show();
        });

        $('#eutanasia_btn_up').on('click', function () {
            $('#eutanasia').slideToggle(800);
            $(this).hide();
            $('#eutanasia_btn_down').show();
        });

        $('#eutanasia_btn_down').on('click', function () {
            $('#eutanasia').slideToggle(800);
            $(this).hide();
            $('#eutanasia_btn_up').show();
        });

        $('#resultado_btn_up').on('click', function () {
            $('#resultado').slideToggle(800);
            $(this).hide();
            $('#resultado_btn_down').show();
        });

        $('#resultado_btn_down').on('click', function () {
            $('#resultado').slideToggle(800);
            $(this).hide();
            $('#resultado_btn_up').show();
        });
    </script>

@endsection
