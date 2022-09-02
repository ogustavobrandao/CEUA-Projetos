@if(!isset($disabled))
    <div class="row mt-4">
        <div class="col-3">
            <a class="btn btn-secondary w-100" href="#">Voltar</a>
        </div>

        <div class="col-6">
        </div>

        <div class="col-3">
            @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                <input type="hidden" name="conclusaoPendencia" value="1">
                <button type="submit" class="btn btn-success w-100" onclick="return confirm('Após concluir não será mais possivel modificar a solicitação.\nTem certeza que deseja concluir a solicitação?')"
                >@if($solicitacao->estado_pagina == 11) Concluir @else Próximo @endif</button>
            @else
                <button type="submit" class="btn btn-success w-100">@if($solicitacao->estado_pagina == 11) Concluir @else Próximo @endif</button>

            @endif
        </div>
    </div>
@endif
