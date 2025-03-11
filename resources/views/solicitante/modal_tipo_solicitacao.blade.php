<!-- Modal -->
<div class="modal fade" id="solicitacaoModal" tabindex="-1" role="dialog" aria-labelledby="solicitacaoModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center pb-0">
                <h5 class="modal-title w-100 titulo" id="solicitacaoModalTitle" style="font-size: 24px">Criar
                    Solicitação</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('solicitacao.inicio')}}">
                @csrf
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <h5>Selecione o tipo da sua solicitação:</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo1" value="Ensino"
                                       checked>
                                <label class="form-check-label" for="tipo1">
                                    Ensino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo2" value="Extensão">
                                <label class="form-check-label" for="tipo2">
                                    Extensão
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo3" value="Pesquisa">
                                <label class="form-check-label" for="tipo3">
                                    Pesquisa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo4" value="Treinamento">
                                <label class="form-check-label" for="tipo4">
                                    Treinamento
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                    <button type="button" class="btn btn-success" disabled>Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
