@extends('layouts.app')

@section('content')
    <div class="row my-4 borda-bottom">
        <div class="col-md-12">
            <h3 class="text-center">Solicitações</h3>
        </div>

    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Solicitante</th>
            <th class="w-25 text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($solicitacoes as $solicitacao)
            <tr>
                <td>{{$solicitacao->titulo_pt}}</td>
                <td>{{$solicitacao->user->name}}</td>
                <td class="text-center">
                    <a class="btn btn-group" href="#"><i class="fa-solid fa-up-right-from-square"></i></a>
                    @if($solicitacao->estado_pagina == "avaliando")
                        <a class="btn btn-group" type="button" href="{{route('avaliador.remover',['solicitacao_id'=> $solicitacao->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff0e0e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>                        </a>
                    @elseif($solicitacao->estado_pagina == 12)
                        <button class="btn btn-group" type="button" data-toggle="modal" data-target="#addAvaliador_{{$solicitacao->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#212529" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        </button>
                    @endif
                </td>
            </tr>
                <div class="modal fade" id="addAvaliador_{{$solicitacao->id}}" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cadastroModalLabel">Atribuir Avaliador</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{route('avaliador.atribuir')}}">
                                @csrf
                                <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="">
                                    <div class="row justify-content-center mt-2">
                                        <div class="col-sm-10">
                                            <label for="avaliador">Avaliadores:</label>
                                            <select class="form-control" id="avaliador" name="avaliador">
                                                <option disabled selected>Selecione o Avaliador</option>
                                                @foreach($avaliadores as $avaliador)
                                                    <option value="{{$avaliador->id}}">{{$avaliador->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-success">Atribuir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                "zeroRecords": "Nenhuma Solicitação Cadastrada.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "order": [0,1],
            "columnDefs": [{
                "targets": [2],
                "orderable": false
            }]
        });
    </script>
@endsection
