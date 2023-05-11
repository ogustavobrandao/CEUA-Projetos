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
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required 
                    minlength="10" maxlength="255" autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="email">E-mail:<strong style="color: red">*</strong></label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" 
                    minlength="10" maxlength="255" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-2">
                <label for="celular">Celular:<strong style="color: red">*</strong></label>
                <input class="form-control @error('celular') is-invalid @enderror" id="celular" type="text" name="celular" value="{{ old('celular') }}" 
                    minlength="11" maxlength="11" required autofocus>
                @error('celular')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <div class="col-sm-5">
                <label for="name">CPF:<strong style="color: red">*</strong></label>
                <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" 
                    minlength="11" maxlength="11" required autocomplete="cpf" autofocus>
                @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-sm-5">
                <label for="rg">RG:<strong style="color: red">*</strong></label>
                <input class="form-control @error('rg') is-invalid @enderror" id="rg" type="text" name="rg" value="{{ old('rg') }}" 
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
                <label for="password">{{ __('Senha') }}<strong style="color: red">*</strong></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                    minlength="8" maxlength="255" required autocomplete="current-password">
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
                <select class="form-control @error('instituicao') is-invalid @enderror" id="instituicao" name="instituicao" onchange="unidades('')">
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
                <select class="form-control @error('unidade') is-invalid @enderror" id="unidade" name="unidade" required>
                    <option selected disabled>
                        Selecione uma Unidade
                    </option>
                    @foreach($unidades as $unidade)
                        <option @if(old('unidade') == $unidade->id) selected @endif value="{{$unidade->id}}">{{$unidade->nome}}</option>
                    @endforeach
                </select>
                @error('unidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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

    <script>
        $(document).ready(function($) {
            $('#cpf').mask('000.000.000-00');
            let SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
            $('#celular').mask(SPMaskBehavior, spOptions);
            $("#name").mask("#", {
                maxlength: true,
                translation: {
                    '#': { pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true }
                }
            });
        });
    </script>
@endsection
