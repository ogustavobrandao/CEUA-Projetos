<div class="container">
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">Solicitações</span>
    </div>
</div>

<div class="container text-center">
    <div class="row justify-content-center mt-5">
        <div class="col-9">
            <div class="row justify-content-center">

                <div class="col-5">
                    <a data-toggle="modal" data-target="#solicitacaoModal" href="#">
                        <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable"
                             style="background-color: #131833">
                            <div class="pt-4">
                                <img class="pb-3" src="images/solicitacao.svg" height="120px">
                                <div class="text-center align-middle">
                                    <div class="textoCaixa">Solicitar</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-2">
                </div>

                <div class="col-5">
                    <a href="{{route('solicitacao.solicitante.index')}}">
                        <div class="text-center p-5 shadow caixaSelecao justify-content-center clickable"
                             style="background-color: #143BC2;">
                            <div class="pt-4">
                                <img class="pb-3" src="images/vertical_split.svg" height="120px">
                                <div style="color: white" class="textoCaixa w-100">Minhas Solicitações</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@include('solicitante.modal_tipo_solicitacao')
