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
            <th class="text-center" scope="col">Titulo</th>
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
                <td class="text-center">@if($solicitacao->estado_pagina == 'nao_avaliado')Não Avaliado @else Solicitação em Andamento @endif</td>
                <td class="text-center">
                    @if($solicitacao->estado_pagina != 'nao_avaliado')
                        <a class="btn" href="{{route('solicitacao.form', ['solicitacao_id' => $solicitacao->id])}}" style="border-color: orangered; background-color: #c0ddf6" title="Continuar Preenchendo Solicitação."><i class="fa-regular fa-file-lines" style="color: orangered"></i></a>
                    @else
                    <a href="{{route('solicitacao.edit.form', ['solicitacao_id' => $solicitacao->id])}}"><i class="fa-solid fa-up-right-from-square"></i></a>
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
                "zeroRecords": "Você não possui solicitações.",
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
