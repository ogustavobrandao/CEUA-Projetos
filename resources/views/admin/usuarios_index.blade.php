@extends('layouts.app')

@section('content')
    <div class="row mb-4 borda-bottom">
        <div class="col-md-9">
            <h3 class="text-center">Usuários</h3>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary w-100 pb-1" data-toggle="modal" data-target="#cadastroModal">
                Cadastrar Usuário
            </button>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-center" scope="col">Nome</th>
            <th class="text-center" scope="col">E-Mail</th>
            <th class="text-center" scope="col">CPF</th>
            <th class="text-center" scope="col">Tipo</th>
            <th class="w-25 text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td class="text-center">{{$usuario->name}}</td>
                <td class="text-center">{{$usuario->email}}</td>
                <td class="text-center">{{$usuario->cpf}}</td>
                <td class="text-center">{{$usuario->tipoUsuario->nome}}</td>
                <td class="text-center">
                    <button class="btn btn-group" type="button" data-toggle="modal" data-target="#editModal_{{$usuario->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('usuario.store') }}">
                    @csrf
                    <div class="modal-body">
                        @csrf
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-5">
                                <label for="name">Nome:</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                                       autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <label for="email">E-mail:</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-5">
                                <label for="cpf">CPF:</label>
                                <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf"
                                       autofocus>
                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <label for="tipo">Tipo do Usuário:</label>
                                <select class="form-control" name="tipo">
                                    <option value="1">
                                        Administrador
                                    </option>
                                    <option value="2">
                                        Avaliador
                                    </option>
                                    <option value="3">
                                        Solicitante
                                    </option>
                                </select>
                            </div>
                        </div>

                        <input id="password" type="hidden" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="password">

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-5">
                                <label for="instituicao">{{ __('Instituição') }}</label>
                                <select class="form-control" id="instituicao" name="instituicao" onchange="unidades()">
                                    <option selected disabled style="font-weight: bolder">
                                        Selecione uma Instituição
                                    </option>
                                    @foreach($instituicaos as $instituicao)
                                        <option @if(old('instituicao') == $instituicao->id) selected @endif value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                    @endforeach

                                </select>
                                @error('instituicao')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <label for="unidade">{{ __('Unidade') }}</label>
                                <select class="form-control" id="unidade" name="unidade">
                                    <option selected disabled>
                                        Selecione uma Unidade
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($usuarios as $usuario)
        <div class="modal fade" id="editModal_{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('usuario.update') }}">
                        @csrf
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="name">Nome:</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $usuario->name }}" required autocomplete="name"
                                           autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5">
                                    <label for="email">E-mail:</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $usuario->email  }}" required autocomplete="email"
                                           autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="cpf">CPF:</label>
                                    <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text" name="cpf" value="{{ $usuario->cpf }}" required autocomplete="cpf"
                                           autofocus>
                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5">
                                    <label for="tipo">Tipo do Usuário:</label>
                                    <select class="form-control" name="tipo">
                                        <option value="1" @if($usuario->tipoUsuario->id == 1) selected @endif>
                                            Administrador
                                        </option>
                                        <option value="2" @if($usuario->tipoUsuario->id == 2) selected @endif>
                                            Avaliador
                                        </option>
                                        <option value="3" @if($usuario->tipoUsuario->id == 3) selected @endif>
                                            Solicitante
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="password">{{ __('Senha') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{$usuario->password}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{$usuario->password}}">
                                </div>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="instituicao">{{ __('Instituição') }}</label>
                                    <select class="form-control" id="instituicao" name="instituicao" onchange="unidades()">
                                        <option selected disabled style="font-weight: bolder">
                                            Selecione uma Instituição
                                        </option>
                                        @foreach($instituicaos as $instituicao)
                                            <option @if(old('instituicao') == $instituicao->id) selected @endif value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                        @endforeach

                                    </select>
                                    @error('instituicao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label for="unidade">{{ __('Unidade') }}</label>
                                    <select class="form-control" id="unidade" name="unidade">
                                        <option selected disabled>
                                            Selecione uma Unidade
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

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
