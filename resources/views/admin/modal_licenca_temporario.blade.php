<div class="modal fade" id="licencaModal_{{$avaliacao->id}}" tabindex="-1" role="dialog"
     aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="licencaModalLabel">Dados da Licença</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 mb-2">
                        <label for="codigo">Código:</label>
                        <input class="form-control" disabled
                               value="{{$avaliacao->licenca->codigo}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="inicio">Data de Início:</label>
                        <input class="form-control" type="date" disabled
                               value="{{$avaliacao->licenca->inicio}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="fim">Data de Fim:</label>
                        <input class="form-control" type="date" disabled
                               value="{{$avaliacao->licenca->fim}}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
