<div class="row mt-4">
    <div class="col-6"></div>

    <div class="col-6">
        @if(Auth::user()->tipo_usuario_id == 3 && !isset($disabled))
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        @elseif(Auth::user()->tipo_usuario_id == 2)
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <a type="button" class="btn btn-danger w-100" onclick="showAvaliacaoIndividual({{$tipo}},{{$avaliacao_id}},{{$id}})">Reprovar</a>
                </div>
                <div class="col-4">
                    <a type="button" class="btn btn-success w-100" onclick="realizarAvaliacaoInd({{$tipo}},{{$avaliacao_id}},{{$id}},'aprovado')">Aprovar</a>
                </div>
            </div>
        @endif
    </div>
</div>

