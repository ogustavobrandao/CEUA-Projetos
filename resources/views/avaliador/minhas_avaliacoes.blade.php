@extends('layouts.app')

@section('content')
    <div class="row mb-4 borda-bottom">
        <div class="col-md-12">
            <h3 class="text-center titulo">Minhas Avaliações</h3>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-center" scope="col">Solicitante</th>
            <th class="text-center" scope="col">Titulo</th>
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
                    @if($avaliacao->status == 'nao_realizado')Não Avaliado
                    @elseif($avaliacao->status == 'aprovada') Aprovada
                    @elseif($avaliacao->solicitacao->status == "avaliado" && $avaliacao->status == 'aprovadaPendencia') Aprovada com pendência
                    @elseif($avaliacao->solicitacao->status == "nao_avaliado" && $avaliacao->status == "aprovadaPendencia") Re-Avaliar
                    @else Reprovado @endif</td>
                <td class="text-center">
                    @if(($avaliacao->solicitacao->updated_at->diffInHours($horario) >= 2 && $avaliacao->solicitacao->updated_at < $horario)
                        || $avaliacao->solicitacao->avaliador_atual_id == Auth::user()->id
                        || $avaliacao->solicitacao->avaliador_atual_id == null)
                        @if($avaliacao->status == 'nao_realizado')
                            <a href="{{route('avaliador.solicitacao.avaliar', ['solicitacao_id' => $avaliacao->solicitacao->id])}}">Avaliar</a>
                        @elseif(($avaliacao->solicitacao->status == "nao_avaliado" && $avaliacao->status == "aprovadaPendencia"))
                            <a href="{{route('avaliador.solicitacao.avaliar', ['solicitacao_id' => $avaliacao->solicitacao->id])}}">Re-Avaliar</a>
                        @elseif($avaliacao->status == 'aprovada')
                            <a style="color: forestgreen; font-weight: bold">Aprovada</a>
                        @elseif($avaliacao->status == 'reprovada')
                            <a style="color: red; font-weight: bold">Reprovada</a>
                        @endif
                    @else
                        <a style="color: red; font-weight: bold">Em avaliação</a>
                    @endif
                </td>
            </tr>
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
                "zeroRecords": "Você não possui avaliações.",
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
