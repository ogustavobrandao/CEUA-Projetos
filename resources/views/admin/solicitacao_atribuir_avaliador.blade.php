    <div class="row container-fluid min-vh justify-content-center">
        <div class="col-10">
            <div class="shadow p-5">
                <div class="row mb-4 pt-3 ">

                    <div class="col-md-12">
                        <h3 class="text-left titulo">Solicitações</h3>
                        <hr class="bg-secondary w-80 mt-3">
                    </div>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

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
                        @if($solicitacao->status != "avaliado" && $solicitacao->status != null || $solicitacao->status == 'avaliado' && $solicitacao->Avaliacao()->where('status', 'aprovadaPendencia')->first())

                            <tr>
                                <td>{{$solicitacao->titulo_pt}}</td>
                                <td>{{$solicitacao->user->name}}</td>
                                <td class="text-center">
                                    <a class="btn btn-group" href="{{ route('solicitacao.admin.visualizar', ['solicitacao_id' => $solicitacao->id]) }}"><i
                                            class="fa-solid fa-up-right-from-square"></i></a>

                                    @if($solicitacao->status == 'nao_avaliado' || $solicitacao->Avaliacao()->where('status', '!=','aprovadaPendencia')->first())        
                                        <button class="btn btn-group" type="button" data-toggle="modal"
                                                data-target="#addAvaliador_{{$solicitacao->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#212529" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </button>
                                    @endif
                                    @if($solicitacao->status == "avaliando")
                                        <button class="btn btn-group" type="button" data-toggle="modal"
                                                data-target="#removeAvaliador_{{$solicitacao->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="#ff0e0e" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="18" y1="8" x2="23" y2="13"></line>
                                                <line x1="23" y1="8" x2="18" y2="13"></line>
                                            </svg>
                                            </a>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @endif

                        {{--Modal de adição de avaliador--}}
                        <div class="modal fade" id="addAvaliador_{{$solicitacao->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="cadastroModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cadastroModalLabel">Atribuir Avaliador</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{route('avaliador.atribuir')}}" id="adicionarAvaliadorForm{{$solicitacao->id}}">
                                        @csrf
                                        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                        <div class="modal-body">
                                            <div class="row justify-content-center mt-2">
                                                <div class="col-sm-10">
                                                    <label for="avaliador">Clique para selecionar um ou mais
                                                        avaliadores:</label>
                                                    <div class="list-group">
                                                        @foreach($avaliadores as $avaliador)
                                                            @if(empty($avaliador->avaliacoes->where('solicitacao_id',$solicitacao->id)->first()))
                                                                <label class="list-group-item">
                                                                    <input class="form-check-input me-1" type="checkbox"
                                                                           name="avaliadores_id[]"
                                                                           value="{{$avaliador->id}}">
                                                                    {{$avaliador->name}}
                                                                </label>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fechar
                                            </button>
                                            <button id="submitAdicionarAvaliador{{$solicitacao->id}}" type="submit" class="btn btn-success" onclick="submitAdicionarAvaliador({{$solicitacao->id}})">Atribuir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--Modal de remoção de avaliador--}}
                        <div class="modal fade" id="removeAvaliador_{{$solicitacao->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="cadastroModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cadastroModalLabel">Remover Avaliador</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" id="removerAvaliadorForm{{$solicitacao->id}}" action="{{route('avaliador.remover')}}">
                                        @csrf
                                        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                                        <div class="modal-body">
                                            <div class="row justify-content-center mt-2">
                                                <div class="col-sm-10">
                                                    <label for="avaliador">Clique para selecionar um ou mais
                                                        avaliadores:</label>
                                                    <div class="list-group">
                                                        @foreach($avaliadores as $avaliador)
                                                            @if(!empty($avaliador->avaliacoes->where('solicitacao_id',$solicitacao->id)->first()))
                                                                <label class="list-group-item">
                                                                    <input class="form-check-input me-1" type="checkbox"
                                                                           name="avaliadores_id[]"
                                                                           value="{{$avaliador->id}}">
                                                                    {{$avaliador->name}}
                                                                </label>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fechar
                                            </button>
                                            <button id="submitRemoverAvaliador{{$solicitacao->id}}" type="submit" class="btn btn-danger" onclick="submitRemoverAvaliador({{$solicitacao->id}})">Remover</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function submitRemoverAvaliador(id) {
            event.preventDefault();
            $("#submitRemoverAvaliador" + id).prop("disabled", true);
            $("#removerAvaliadorForm" + id).submit();
        }

        function submitAdicionarAvaliador(id) {
            event.preventDefault();
            $("#submitAdicionarAvaliador" + id).prop("disabled", true);
            $("#adicionarAvaliadorForm" + id).submit();
        }
    </script>

