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
            <div class="col-sm-4">
                <label for="name">Nome:<strong style="color: red">*</strong></label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                       autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="email">E-mail:<strong style="color: red">*</strong></label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-2">
                <label for="name">CPF:<strong style="color: red">*</strong></label>
                <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf"
                       autofocus>
                @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <div class="col-sm-5">
                <label for="password">{{ __('Senha') }}<strong style="color: red">*</strong></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-sm-5">
                <label for="password-confirm">{{ __('Confirmar Senha') }}<strong style="color: red">*</strong></label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <div class="col-sm-5">
                <label for="instituicao">{{ __('Instituição') }}<strong style="color: red">*</strong></label>
                <select class="form-control" id="instituicao" name="instituicao" onchange="unidades('')">
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
                <label for="unidade">{{ __('Unidade') }}<strong style="color: red">*</strong></label>
                <select class="form-control" id="unidade" name="unidade">
                    <option selected disabled>
                        Selecione uma Unidade
                    </option>
                    @foreach($unidades as $unidade)
                        <option @if(old('unidade') == $unidade->id) selected @endif value="{{$unidade->id}}">{{$unidade->nome}}</option>
                    @endforeach
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
