<!-- Modal -->
<div class="modal fade" id="modalDeletar{{$solicitacao->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{$solicitacao->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{route('solicitacao.delete', ['solicitacao_id' => $solicitacao->id])}}" method="POST">
            @csrf
            @method('DELETE')
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Deletar colaborador</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Tem certeza que deseja excluir esta solicitação?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </form>
      </div>
    </div>
</div>