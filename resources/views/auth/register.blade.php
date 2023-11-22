@extends('layouts.app')

@section('content')
<style>
.home_background {
    background-image: url({{asset('images/CEUA_logo_vinho.png')}});
}
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 p-0 d-flex justify-content-center align-items-center">
                <div class="home_background">
                </div>
            </div>

            <div class="col-md-6 p-5">
                <div class="login_form d-flex align-items-center justify-content-center">
                    <div class="col-12">
                        <form class="shadow p-3 bg-cinza rounded-sm py-3 pt-3-2" method="POST" action="{{ route('store_solicitante') }}">
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <h1 class="text-left borda-bottom titulo px-3">Cadastro</h1>
                                </div>
                            </div>

                            @csrf
                            <div class="justify-content-center mt-2">
                                <div class="col-sm-auto">
                                    <label for="name" class="text-black-50">Nome:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required minlength="10" maxlength="255" autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-auto">
                                    <label for="email" class="text-black-50">E-mail:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" minlength="10" maxlength="255" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="celular" class="text-black-50">Celular:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('celular') is-invalid @enderror" id="celular" type="text" name="celular" value="{{ old('celular') }}" minlength="11" maxlength="16" required autofocus>
                                    @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="justify-content-center mt-2">
                                <div class="col-sm-auto">
                                    <label for="name" class="text-black-50">CPF:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" minlength="11" maxlength="15" required autocomplete="cpf" autofocus>
                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-auto">
                                    <label for="rg" class="text-black-50">RG:<strong style="color: red">*</strong></label>
                                    <input class="form-control @error('rg') is-invalid @enderror" id="rg" type="text" name="rg" value="{{ old('rg') }}" minlength="7" maxlength="14" required autofocus>
                                    @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="justify-content-center mt-2">
                                <div class="col-sm-auto">
                                    <label for="instituicao" class="text-black-50">{{ __('Instituição') }}<strong style="color: red">*</strong></label>
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
                                <div class="col-sm-auto">
                                    <label for="unidade" class="text-black-50">{{ __('Unidade') }}<strong style="color: red">*</strong></label>
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

                            <div class="justify-content-center mt-2">
                                <div class="col-sm-auto">
                                    <label for="password" class="text-black-50">{{ __('Senha') }}<strong style="color: red">*</strong></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength="8" maxlength="255" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-auto">
                                    <label for="password-confirm" class="text-black-50">{{ __('Confirmar Senha') }}<strong style="color: red">*</strong></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-8 text-left  mx-lg-3 mt-3">
                                    <button type="submit" class="btn w-50 navbar_color text-white font-weight-bold">
                                        {{ __('Cadastrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
