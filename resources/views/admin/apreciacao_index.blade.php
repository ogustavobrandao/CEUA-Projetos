<div class="row container-fluid min-vh justify-content-center">
    <div class="col-10">
        <div class="shadow-lg p-5">
            <div class="row mb-4 pt-3 ">
                <div class="col-md-12">
                    <h3 class="text-left titulo">Avaliações</h3>
                    <hr class="bg-secondary w-80 mt-3">
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center" scope="col">Solicitante</th>
                    <th class="text-center" scope="col">Título</th>
                    <th class="text-center" scope="col">Tipo</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="w-25 text-center" scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($avaliacoes as $avaliacao)
                    @if($avaliacao->status == 'aprovado_avaliador' || $avaliacao->status == 'aprovado_colegiado'||$avaliacao->status == 'reprovado')
                        <tr>
                            <td class="text-center">{{$avaliacao->solicitacao->user->name}}</td>
                            <td class="text-center">{{$avaliacao->solicitacao->titulo_pt}}</td>
                            <td class="text-center">{{$avaliacao->solicitacao->tipo}}</td>
                            <td class="text-center">@if($avaliacao->status == 'aprovado' || $avaliacao->status == 'aprovado_colegiado' && isset($avaliacao->licenca))
                                    Aprovado pelo Colegiado
                                    @elseif($avaliacao->status == 'aprovado_avaliador')
                                    Aprovado pelo Avaliador
                                    @else
                                    Reprovado
                                @endif</td>
                            <td class="text-center">
                                @if($avaliacao->status == 'aprovado_avaliador' && !isset($avaliacao->licenca))
                                    <a href="{{route('solicitacao.admin.apreciacao', ['solicitacao_id' => $avaliacao->solicitacao->id])}}">Avaliar</a>
                                @elseif($avaliacao->status == 'aprovado' || $avaliacao->status == 'aprovado_colegiado')
                                    <a class="btn btn-info" style="color: white" data-toggle="modal"
                                       data-target="#licencaModal_{{$avaliacao->id}}" title="Dados da licença">
                                        <i class="fa-regular fa-id-card"></i>
                                    </a>
                                @elseif($avaliacao->status == 'reprovado')
                                    <i class="btn btn-danger fa fa-window-close" aria-hidden="true" title="Reprovado"></i>
                                @endif
                                @if($avaliacao->status != 'aprovado')
                                    <a href="#" class="btn btn-primary" onclick="carregarHistoricoModal({{$avaliacao->solicitacao_id}})" title="Histórico da solicitação">
                                        <i class="fas fa-history"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>

                        @if($avaliacao->status == 'aprovado' || $avaliacao->status == 'aprovado_colegiado' && isset($avaliacao->licenca))
                            @include('admin.modal_licenca_temporario', compact('avaliacao'))
                        @endif
                    @endif
                @endforeach
                <div id="historicoModalContent"></div>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function carregarHistoricoModal(solicitacao_id) {
        $.ajax({
            url: '/historico_modal/' + solicitacao_id,
            method: 'GET',
            success: function(response) {
                $('#historicoModalContent').html(response.html);
                $('#historicoModal').modal('show');
            },
            error: function() {
                console.log('Erro ao carregar o modal de histórico.');
            }
        });
    }
</script>
