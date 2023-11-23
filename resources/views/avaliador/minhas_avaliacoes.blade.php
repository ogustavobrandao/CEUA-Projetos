@extends('layouts.app')

@section('navbar-type')
    @include('layouts.components.navbar')
@endsection

@section('content')
    <div class="row container-fluid min-vh justify-content-center">
        <div class="col-10">
            <div class="shadow-lg p-5">
                <div class="row mb-4 pt-3 ">
                    <div class="col-md-12">
                        <h3 class="text-center titulo">Minhas Avaliações</h3>
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
                        <tr>
                            <td class="text-center">{{$avaliacao->solicitacao->user->name}}</td>
                            <td class="text-center">{{$avaliacao->solicitacao->titulo_pt}}</td>
                            <td class="text-center">{{$avaliacao->solicitacao->tipo}}</td>
                            <td class="text-center">
                                @if($avaliacao->status == 'nao_realizado')
                                    Não Avaliado
                                @elseif($avaliacao->status == 'aprovado' || $avaliacao->status == 'aprovado_colegiado' && isset($avaliacao->licenca))
                                    Aprovado
                                @elseif($avaliacao->status == 'aprovado_avaliador' && !isset($avaliacao->licenca))
                                    Encaminhamento ao Colegiado
                                @elseif($avaliacao->solicitacao->status == "avaliado" && $avaliacao->status == 'aprovadaPendencia')
                                    Aprovada com pendência
                                @elseif($avaliacao->solicitacao->status == "nao_avaliado" && $avaliacao->status == "aprovadaPendencia")
                                    Re-Avaliar
                                @else
                                    Reprovado
                                @endif</td>
                            <td class="text-center">
                                @if(($avaliacao->solicitacao->updated_at->diffInHours($horario) >= 2 && $avaliacao->solicitacao->updated_at < $horario)
                                    || $avaliacao->solicitacao->avaliador_atual_id == Auth::user()->id
                                    || $avaliacao->solicitacao->avaliador_atual_id == null)
                                    @if($avaliacao->status == 'aprovado' || $avaliacao->status == 'aprovado_colegiado' && isset($avaliacao->licenca))
                                        <a class="btn btn-info" style="color: white" data-toggle="modal"
                                           data-target="#licencaModal_{{$avaliacao->id}}" title="Dados da licença">
                                            <i class="fa-regular fa-id-card"></i>
                                        </a>
                                        <a class="btn btn-info" style="color: white"
                                           href="{{route('pdf.gerarPDFAprovado', ['solicitacao_id' => $avaliacao->solicitacao->id])}}"
                                           title="Gerar PDF."><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                    @endif

                                <a class="btn @if($avaliacao->status == 'nao_realizado' || ($avaliacao->solicitacao->status == "nao_avaliado" && $avaliacao->status == "aprovadaPendencia"))btn-success
                                              @elseif($avaliacao->status == 'reprovado') btn-danger
                                              @else btn-info @endif"
                                   style="color: white"
                                   href="{{route('avaliador.solicitacao.avaliar', ['solicitacao_id' => $avaliacao->solicitacao->id])}}"
                                   title="Abrir Solicitação"> <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                @else
                                    <a style="color: red; font-weight: bold">Em avaliação</a>
                                @endif
                            </td>
                        </tr>
                        @if($avaliacao->status == 'aprovado' || $avaliacao->status == 'aprovado_colegiado' && isset($avaliacao->licenca))
                            @include('admin.modal_licenca_temporario', compact('avaliacao'))
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $('.table').DataTable({
            searching: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "search": "Pesquisar",
                "infoEmpty": "",
                "zeroRecords": "Você não possui avaliações.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
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
    </script>
@endsection
