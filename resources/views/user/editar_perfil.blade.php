@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card shadow-lg p-3 bg-white col-8" style="border-radius: 10px">
            <div class="row mb-4 mt-2 borda-bottom">
                <div class="col-md-12">
                    <h3 class="text-center">Editar Perfil</h3>
                </div>
            </div>

            <form method="POST" action="{{ route('user.perfil.alterar') }}">
                @csrf
                <div class="row justify-content-center mt-2">
                    <div class="col-sm-10">
                        <label for="name">Nome:</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                               name="name"
                               value="{{$user->name}}" required autocomplete="name"
                               autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-sm-5">
                        <label for="email">E-mail:</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                               name="email" value="{{ $user->email }}" required autocomplete="email"
                               autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-sm-5">
                        <label for="cpf">CPF:</label>
                        <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text" name="cpf"
                               value="{{ $user->cpf }}" required autocomplete="cpf"
                               autofocus>
                        @error('cpf')
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
                        <label for="instituicao">{{ __('Instituição') }}</label>
                        <select class="form-control" id="instituicao_create" name="instituicao"
                                onchange="unidades('_create')" disabled>
                            <option selected disabled style="font-weight: bolder">
                                {{$user->unidade->instituicao->nome}}
                            </option>

                        </select>
                        @error('instituicao')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-sm-5">
                        <label for="unidade">{{ __('Unidade') }}</label>
                        <select class="form-control" id="unidade_create" name="unidade" disabled>
                            <option selected disabled>
                                {{$user->unidade->nome}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer mt-4">
                    <a class="btn btn-secondary" href="javascript:history.back()">Voltar</a>
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
