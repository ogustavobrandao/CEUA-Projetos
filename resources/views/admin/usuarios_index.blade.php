@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="shadow-lg p-5">
            <div class="row my-4">
                <div class="row mb-4">
                    <div class="col-md-9">
                        <h3 class="text-left">Usuários</h3>
                    </div>
                    <hr class="bg-secondary w-80 mt-3">
                </div>
                @if(session('sucesso'))
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 5px;">
                            <div class="alert alert-success" role="alert">
                                <p>{{session('sucesso')}}</p>
                            </div>
                        </div>
                    </div>
                @endif
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
                            <td class="text-center">{{$usuario->tipoUsuario}}</td>
                            <td class="text-center">
                                <button class="btn btn-group" type="button" data-toggle="modal"
                                        data-target="#editModal_{{$usuario->id}}"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- Lógica do modal --}}
                <form method="POST" action="{{ route('usuario.store') }}">
                    @csrf
                    <div class="modal-body">
                        @csrf
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-5">
                                <label for="name">Nome:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('name') is-invalid @enderror name" id="name"
                                       type="text" name="name" value="{{ old('name') }}"
                                       minlength="10" maxlength="255" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <label for="email">E-mail:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                       name="email" value="{{ old('email') }}"
                                       minlength="10" maxlength="255" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-5">
                                <label for="cpf">CPF:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('cpf') is-invalid @enderror cpf" id="cpf" type="text"
                                       name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <label for="rg">RG:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('rg') is-invalid @enderror" id="rg" type="text"
                                       name="rg" value="{{ old('rg') }}"
                                       minlength="7" maxlength="14" required autofocus>
                                @error('rg')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-5">
                                <label for="celular">Celular:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('celular') is-invalid @enderror celular" id="celular"
                                       type="text" name="celular" value="{{ old('celular') }}"
                                       minlength="11" maxlength="11" required autofocus>
                                @error('celular')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <label for="tipo">Tipo do Usuário:<strong style="color: red">*</strong></label>
                                <select class="form-control @error('tipo_usuario_id') is-invalid @enderror"
                                        id="tipo_usuario" name="role">
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
                                @error('tipo_usuario_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input id="password" type="hidden" class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password" value="password">

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-5">
                                <label for="instituicao">{{ __('Instituição') }}<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control @error('instituicao_id') is-invalid @enderror"
                                        id="instituicao_create" name="instituicao" onchange="unidades('_create')">
                                    <option selected disabled style="font-weight: bolder">
                                        Selecione uma Instituição
                                    </option>
                                    @foreach($instituicaos as $instituicao)
                                        <option @if(old('instituicao') == $instituicao->id) selected
                                                @endif value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                    @endforeach
                                </select>
                                @error('instituicao_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <label for="unidade">{{ __('Unidade') }}<strong style="color: red">*</strong></label>
                                <select class="form-control @error('unidade_id') is-invalid @enderror"
                                        id="unidade_create" id="unidade" name="unidade" required>
                                    <option selected disabled>
                                        Selecione uma Unidade
                                    </option>
                                </select>
                                @error('unidade_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
        <div class="modal fade" id="editModal_{{$usuario->id}}" tabindex="-1" role="dialog"
             aria-labelledby="cadastroModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cadastroModalLabel">Editar Usuário</h5>
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
                                    <label for="name">Nome:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('name') is-invalid @enderror name"
                                           id="name-usuario-{{$usuario->id}}" type="text" name="name"
                                           value="{{ $usuario->name }}"
                                           minlength="10" maxlength="255" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5">
                                    <label for="email">E-mail:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('email') is-invalid @enderror"
                                           id="email-usuario-{{$usuario->id}}" type="email" name="email"
                                           value="{{ $usuario->email  }}"
                                           minlength="10" maxlength="255" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="cpf">CPF:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('cpf') is-invalid @enderror cpf"
                                           id="cpf-usuario-{{$usuario->id}}" type="text" name="cpf"
                                           value="{{ $usuario->cpf }}" required autocomplete="cpf"
                                           autofocus>
                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5">
                                    <label for="rg">RG:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('rg') is-invalid @enderror"
                                           id="rg-usuario-{{$usuario->id}}" type="text" name="rg"
                                           value="{{ $usuario->rg }}"
                                           minlength="7" maxlength="14" required autofocus>
                                    @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="celular">Celular:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('celular') is-invalid @enderror celular"
                                           id="celular-usuario{{$usuario->id}}" type="text" name="celular"
                                           value="{{ $usuario->celular }}"
                                           minlength="11" maxlength="11" required autofocus>
                                    @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5">
                                    <label for="tipo">Tipo do Usuário:<strong style="color: red">*</strong></label>
                                    <select class="form-control" name="tipo_usuario_id">
                                        <option value="1" @if($usuario->tipoUsuario == 1) selected @endif>
                                            Administrador
                                        </option>
                                        <option value="2" @if($usuario->tipoUsuario == 2) selected @endif>
                                            Avaliador
                                        </option>
                                        <option value="3" @if($usuario->tipoUsuario == 3) selected @endif>
                                            Solicitante
                                        </option>
                                    </select>
                                    @error('tipo_usuario_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="instituicao">{{ __('Instituição') }}<strong
                                            style="color: red">*</strong></label>
                                    <select class="form-control" id="instituicao{{$usuario->id}}" name="instituicao"
                                            onchange="unidades('{{$usuario->id}}')">
                                        <option selected disabled style="font-weight: bolder">
                                            Selecione uma Instituição
                                        </option>
                                        @foreach($instituicaos as $instituicao)
                                            <option @if(old('instituicao') == $instituicao->id) selected
                                                    @endif value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                        @endforeach

                                    </select>
                                    @error('instituicao')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label for="unidade">{{ __('Unidade') }}<strong
                                            style="color: red">*</strong></label>
                                    <select class="form-control" id="unidade{{$usuario->id}}" name="unidade">
                                        <option selected disabled>
                                            Selecione uma Unidade
                                        </option>
                                    </select>
                                    @error('unidade_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="py-2 border-bottom"></div>
                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-5">
                                    <label for="password">{{ __('Senha') }}</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @if($errors->any())
        <script>
            $(document).ready(function() {
                $('#cadastroModal').modal('show');
            });
        </script>
    @endif

    <script>
        $('.table').DataTable({
            searching: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "search": "",
                "infoEmpty": "",
                "zeroRecords": "Nenhuma Solicitacao Criada.",
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
        $('.search-img').after('<div class="col-3"><a data-toggle="modal" data-target="#cadastroModal" class="btn btn-secondary w-100" style="margin-top: 2%">Cadastrar Usuário</a><div>');
    </script>
@endsection
