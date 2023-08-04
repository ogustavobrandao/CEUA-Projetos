<!-- Modal -->
<div class="modal fade" id="historicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Histórico da Solicitação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($historicoModificacoes as $historico)
                        <li class="list-group-item">
                            <strong>Titulo:</strong> {{$solicitacao->titulo_pt}}
                            <br>
                            <strong>Status:</strong>
                            @if($historico->status_solicitacao == 'aprovado_colegiado')
                                Aprovado pelo Colegiado
                            @elseif($historico->status_solicitacao == 'aprovado_avaliador')
                                Aprovado pelo Avaliador
                            @elseif($historico->status_solicitacao == 'nao_avaliado')
                                Não avaliado
                            @elseif($historico->status_solicitacao == 'aprovadaPendencia')
                                Aprovado com Pendência
                            @else
                                Reprovado
                            @endif
                            <br>
                            <strong>Usuário Modificador:</strong> {{ $historico->nome_usuario_modificador }}
                            <br>
                            <strong>Data da Modificação:</strong> {{ $historico->created_at->format('d/m/Y') }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#close, .close').on('click', function() {
            $('#historicoModal').modal('hide');
        });
    });
</script>
