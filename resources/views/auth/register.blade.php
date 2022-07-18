@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center borda-bottom">Registro de Usuário</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="tipo_usuario_id" value="3">

        <div class="row justify-content-center mt-2">
            <div class="col-sm-5">
                <label for="name">Nome:</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                       autofocus>
                @error('email')
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
                <label for="password">{{ __('Senha') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-sm-5">
                <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <div class="col-sm-5">
                <label for="instituicao">{{ __('Instituição') }}</label>
                <select class="form-control" id="instituicao" name="instituicao_id">
                    <option selected disabled style="font-weight: bolder">
                        Escolha uma Instituição
                    </option>
                    @foreach($instituicaos as $instituicao)
                        <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                    @endforeach

                </select>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-sm-5">
                <label for="unidade">{{ __('Unidade') }}</label>
                <select class="form-control" id="unidade" name="unidade_id">
                    <option selected disabled>
                        Escolha uma Unidade
                    </option>
                </select>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-3 offset-8 text-center">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Cadastrar') }}
                </button>
            </div>
        </div>
    </form>
@endsection
