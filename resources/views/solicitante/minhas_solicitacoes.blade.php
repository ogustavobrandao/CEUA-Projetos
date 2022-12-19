@extends('layouts.app')

@section('content')
    <div class="row mb-4 borda-bottom">
        <div class="col-md-12">
            <h3 class="text-center titulo">Minhas Solicitações</h3>
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
        @foreach($solicitacoes as $solicitacao)
            <tr>
                <td class="text-center">{{$solicitacao->user->name}}</td>
                <td class="text-center">{{$solicitacao->titulo_pt}}</td>
                <td class="text-center">{{$solicitacao->tipo}}</td>
                <td class="text-center">

                    @if($solicitacao->status == null)Em progresso
                    @elseif(\Illuminate\Support\Carbon::parse(($solicitacao->updated_at))->diffInDays(\Illuminate\Support\Carbon::parse($solicitacao->avaliacao->first()->updated_at)) > 30)
                        <strong style="color:red;">Reprovado <small>(Tempo expirado)</small></strong>
                    @elseif($solicitacao->status == 'nao_avaliado')Não Avaliado
                    @elseif($solicitacao->status == 'avaliando')Em avaliação
                    @elseif($solicitacao->avaliacao->first()->status == "aprovado")Aprovado
                    @elseif($solicitacao->avaliacao->first()->status == "reprovado")Reprovado
                    @else Aprovado com pendência
                    @endif
                </td>
                <td class="text-center">
                    @if($solicitacao->status == null)
                        <a class="btn" href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}" style="border-color: #1d68a7; color: #1d68a7; background-color: #c0ddf6"
                           title="Continuar Preenchendo Solicitação."><i class="fa-solid fa-file"></i></a>

                    @elseif(($solicitacao->status == "nao_avaliado" && $solicitacao->avaliacao->first() == null))
                        <a class="btn" href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}" style="border-color: #1B1C42; background-color: #c0ddf6"
                           title="Editar Solicitação."><i class="fa-solid fa-up-right-from-square"></i></a>
                    @elseif($solicitacao->status == "avaliado" && $solicitacao->avaliacao->first()->status == "aprovadaPendencia")
                        @if(\Illuminate\Support\Carbon::parse(($solicitacao->updated_at))->diffInDays(\Illuminate\Support\Carbon::parse($solicitacao->avaliacao->first()->updated_at)) <= 30)
                        <a class="btn" href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}" style="border-color: #1B1C42; background-color: #c0ddf6"
                           title="Editar Solicitação."><i class="fa-solid fa-up-right-from-square"></i></a>
                        @endif
                    @elseif(($solicitacao->avaliacao->first()->status == "reprovada") ||
                            ($solicitacao->avaliacao->first()->status == "aprovado"))
                        {{-- <a class="btn" href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}" style="border-color: #1B1C42; background-color: #c0ddf6"
                           title="Visualizar Solicitação."><i class="fa-solid fa-up-right-from-square"></i></a> --}}
                        @if($solicitacao->avaliacao->first()->status == "aprovado")
                            <a class="btn" style="border-color: #1B1C42; background-color: #c0ddf6" data-toggle="modal" data-target="#licencaModal{{$solicitacao->id}}" title="Licença."><i
                                    class="fa-regular fa-id-card"></i></a>
                        @endif
                    @endif

                </td>
            </tr>

            @if($solicitacao->status == "avaliado" && $solicitacao->avaliacao->first()->status == "aprovado")
                <!-- Modal Licença -->
                <div class="modal fade" id="licencaModal{{$solicitacao->id}}" tabindex="-1" role="dialog" aria-labelledby="licencaModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="licencaModalLabel">Dados da Licença</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="codigo">Código:</label>
                                        <input class="form-control" disabled
                                               value="{{$solicitacao->avaliacao->first()->licenca->codigo}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="inicio">Data de Início:</label>
                                        <input class="form-control" type="date" disabled
                                               value="{{$solicitacao->avaliacao->first()->licenca->inicio}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="fim">Data de Fim:</label>
                                        <input class="form-control" type="date" disabled
                                               value="{{$solicitacao->avaliacao->first()->licenca->fim}}">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </tbody>
    </table>

    <script>
        $('.table').DataTable({
            searching: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "search": "Pesquisar",
                "infoEmpty": "",
                "zeroRecords": "Nenhuma Solicitacao Criada.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "order": [0, 1, 2, 3],
            "columnDefs": [{
                "targets": [4],
                "orderable": false
            }]
        });
    </script>
@endsection
