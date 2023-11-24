<div class="row mt-4">
    <div class="col-6">
    </div>
    @if(Auth::user()->hasRole('Avaliador'))
        <div class="col-10 DivAporvado">
            <div class="row justify-content-start">
                <div class="col-3">
                    <a type="button" class="btn btn-success w-100" onclick="realizarAvaliacaoInd({{$tipo}},{{$avaliacao_id}},{{$id}},'aprovado')">Aprovar</a>
                </div>
                <div class="col-3">
                    @if(!isset($tipo))
                        {{dd("menssagem!!")}}
                    @endif
                    <a type="button" class="btn btn-danger w-100" onclick="showAvaliacaoIndividual({{$tipo}},{{$avaliacao_id}},{{$id}})">Reprovar</a>
                </div>

            </div>
        </div>
    @endif
</div>



