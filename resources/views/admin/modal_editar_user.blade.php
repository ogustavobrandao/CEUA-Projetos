
<div class="modal fade" id="editarModal{{$usuario->id}}" tabindex="-1" role="dialog"
     aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroModalLabel">Editar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('usuario.update', ['id' => $usuario->id])}}">
                @method('PUT')
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
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="roles[]" @if ($usuario->hasRole('Administrador'))
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">Administrador</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="roles[]" @if ($usuario->hasRole('Avaliador'))
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="inlineCheckbox2">Avaliador</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" name="roles[]" @if ($usuario->hasRole('Solicitante'))
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="inlineCheckbox3">Solicitante</label>
                                </div>
                            </div>
                            
                            {{-- @error('tipo_usuario_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> Alterar esta logica
                            @enderror --}}
                        </div>
                    </div>

                    <div class="row justify-content-center mt-2">
                        <div class="col-sm-5">
                            <label for="instituicao">{{ __('Instituição') }}<strong
                                    style="color: red">*</strong></label>
                            <select class="form-control" id="instituicao{{$usuario->id}}" name="instituicao"
                                    onchange="unidades('{{$usuario->id}}')">
                                <option selected style="font-weight: bolder" value="{{$usuario->unidade->instituicao_id}}">
                                    {{$usuario->unidade->instituicao->nome}}
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
                                <option selected value="{{$usuario->unidade}}">
                                    {{$usuario->unidade->nome}}
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
