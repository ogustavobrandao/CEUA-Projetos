@extends('layouts.app')

@section('content')
    <div class="row container-fluid min-vh justify-content-center">
        <div class="col-10">
            <div class="shadow-lg p-5">
                <div class="row mb-4 pt-3">
                    <div class="col-md-12">
                        <h3 class="text-left titulo">Solicitações</h3>
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
                    @foreach($solicitacoes as $solicitacao)
                        <tr>
                            <td class="text-center">{{$solicitacao->user->name}}</td>
                            <td class="text-center">{{$solicitacao->titulo_pt}}</td>
                            <td class="text-center">{{$solicitacao->tipo}}</td>
                            <td class="text-center">
                                @if($solicitacao->status == null)
                                    Em progresso
                                @elseif(($solicitacao->avaliacao->first() != null ) && (\Illuminate\Support\Carbon::parse(($solicitacao->updated_at))->diffInDays(\Illuminate\Support\Carbon::parse($solicitacao->avaliacao->first()->updated_at)) > 30))
                                    <strong style="color:red;">Reprovado <small>(Tempo expirado)</small></strong>
                                @elseif($solicitacao->status == 'nao_avaliado')
                                    Não Avaliado
                                @elseif(($solicitacao->avaliacao->first()->status == "aprovado" || $solicitacao->avaliacao->first()->status == "aprovado_colegiado") && isset($solicitacao->avaliacao->first()->licenca))
                                    Aprovado
                                @elseif($solicitacao->status == 'avaliando' || $solicitacao->avaliacao->first()->status == "aprovado_avaliador")
                                    Em avaliação
                                @elseif($solicitacao->avaliacao->first()->status == "reprovado")
                                    Reprovado
                                @else
                                    Aprovado com pendência
                                @endif
                            </td>
                            <td class="text-center">
                                @if($solicitacao->status == null)
                                    <div class="d-inline-block">
                                        <a class="btn btn-info" style="color: white"
                                           href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}"
                                           title="Continuar Preenchendo Solicitação."><i class="fa-solid fa-file"></i></a>
                                    </div>

                                    <div class="d-inline-block">
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeletar{{$solicitacao->id}}" title="Apagar Solicitação.">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                        </button>
                                        @include('solicitante.deletar_solicitacao_modal', ['solicitacao' => $solicitacao])
                                    </div>
                                       

                                @elseif(($solicitacao->status == "nao_avaliado"))
                                    {{--<a class="btn"
                                        href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}"
                                    style="border-color: #1B1C42; background-color: #e700ff"
                                    title="Editar Solicitação."><i class="fa-solid fa-up-right-from-square"></i></a>--}}
                                    <a class="btn btn-info" style="color: white"
                                       href="{{route('pdf.gerarPDFSolicitacao', ['solicitacao_id' => $solicitacao->id])}}"
                                       title="Gerar PDF."><i class="fa-solid fa-circle-down"></i></a>
                                @elseif($solicitacao->status == "avaliando")
                                    <a class="btn btn-info" style="color: white"
                                       href="{{route('pdf.gerarPDFSolicitacao', ['solicitacao_id' => $solicitacao->id])}}"
                                       title="Gerar PDF."><i class="fa-solid fa-circle-down"></i></a>
                                @elseif($solicitacao->status == "avaliado" && $solicitacao->avaliacao->first()->status == "aprovadaPendencia")
                                    @if(\Illuminate\Support\Carbon::parse(($solicitacao->updated_at))->diffInDays(\Illuminate\Support\Carbon::parse($solicitacao->avaliacao->first()->updated_at)) <= 30)
                                        <a class="btn btn-info" style="color: white"
                                           href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}"
                                           title="Editar Solicitação."><i class="fa-solid fa-up-right-from-square"></i></a>
                                    @endif
                                @elseif(($solicitacao->avaliacao->first()->status != null) ||
                                        ($solicitacao->avaliacao->first()->status != "aprovadaPendencia"))
                                    {{-- <a class="btn" href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}" style="border-color: #1B1C42; background-color: #c0ddf6"
                                       title="Visualizar Solicitação."><i class="fa-solid fa-up-right-from-square"></i></a> --}}
                                    @if($solicitacao->avaliacao->first()->status == "aprovado" || $solicitacao->avaliacao->first()->status == 'aprovado_colegiado')
                                        @if(isset($solicitacao->avaliacao->first()->licenca))
                                            <a class="btn btn-info" style="color: white"
                                               data-toggle="modal" data-target="#licencaModal{{$solicitacao->id}}"
                                               title="Licença."><i
                                                    class="fa-regular fa-id-card"></i></a>
                                            <a class="btn btn-info" style="color: white"
                                               href="{{route('pdf.gerarPDFAprovado', ['solicitacao_id' => $solicitacao->id])}}"
                                               title="Gerar PDF."><i class="fa-solid fa-circle-down"></i></a>
                                        @else
                                            <a class="btn btn-info" style="color: white"
                                               href="{{route('pdf.gerarPDFSolicitacao', ['solicitacao_id' => $solicitacao->id])}}"
                                               title="Gerar PDF."><i class="fa-solid fa-circle-down"></i></a>
                                        @endif
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @if($solicitacao->status == "avaliado" && isset($solicitacao->avaliacao->first()->licenca))
                            @if($solicitacao->avaliacao->first()->status == "aprovado_colegiado" ||
                                $solicitacao->avaliacao->first()->status == "aprovado")
                                <!-- Modal Licença -->
                                <div class="modal fade" id="licencaModal{{$solicitacao->id}}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="licencaModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="licencaModalLabel">Dados da Licença</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Fechar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('solicitante.modal_tipo_solicitacao')

    <script>
        $('.table').DataTable({
            searching: true,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "zeroRecords": "Nenhum registro disponível",
                "search": "",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                }
            },
            "dom": '<"top"f>rt<"bottom"lp><"clear">',
            "order": [0, 1, 2, 3],
            "columnDefs": [{
                "targets": [4],
                "orderable": false
            }]
        });

        $('.dataTables_filter').addClass('here');
        $('.dataTables_filter').addClass('');
        $('.here').removeClass('dataTables_filter');
        $('.table-hover').removeClass('dataTable');
        $('.here').find('input').addClass('search-input');

        $('.search-input').addClass('search-bar-input border w-100')
        $('.search-input').wrap('<div class="row col-12 my-3"><div class="col-md-8 m-0 p-0 search-bar-column" style="height: 60px"> </div></div>')

        $('.here').find('label').contents().unwrap();
        $('.search-bar-column').after('<div class="col-1 p-0 m-0 float-left search-img"><img src="{{asset('images/search.png')}}" height="42px" width="50px"><div>');
        $('.search-img').after('<div class="col-3"><a data-toggle="modal" data-target="#solicitacaoModal" class="btn btn-secondary w-100" style="margin-top: 2%">Criar Solicitação</a><div>');
    </script>
@endsection
