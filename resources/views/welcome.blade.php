@extends('layouts.app')
@section('login')
<style>
.home_background {
    width: 100%;
    height: 100%;
    min-height: 400px;
    background-image: url({{asset('images/background.jpg')}});
    background-repeat: no-repeat, no-repeat;
    background-size: cover;
}

.home_content {
    padding: 2rem;
    color: white;
    text-align: justify;
}

.login_form {
    background-color: white;
    padding: 2rem;
}

.login_form h3 {
    font-size: 42px;
    font-weight: bold;
}

.login_form label {
    font-weight: bold;
}

.login_form .form-control {
    margin-bottom: 1rem;
}

.login_form .btn-primary {
    background-color: black;
}

.login_form .btn-link {
    float: right;
}

.register_link {
    font-weight: bold;
    margin-top: 1rem;
    text-align: left;
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="home_background">
                <div class="home_content">
                    <h1 class="my-lg-5 text-left mb-4" style="font-size: 35px;">
                        Comissão de Ética no Uso de Animais
                    </h1>
                    <p class="mt-2 mb-4" style="font-size: 20px;">
                        A CEUA-UFAPE tem como responsabilidade apreciar os projetos da tríade (Ensino, Pesquisa e Extensão) que desenvolvam atividades as quais façam uso de animais, vinculados a esta instituição de Ensino Superior. Esta Comissão é deliberativa e normativa e suas atribuições estão sob a égide da legislação do CONCEA, em especial, da Resolução Normativa CONCEA nº 51, de 19.05.2021, porém também tem caráter consultivo e educativo.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 p-0">
            <div class="login_form d-flex align-items-center justify-content-center">
                <div class="col-9 mt-4">
                    <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-12">
                                <label for="email">E-mail:</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email"
                                       type="email" name="email" value="{{ old('email') }}" required
                                       autocomplete="email"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-12">
                                <label for="password">{{ __('Senha') }}</label>

                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center my-3">
                            <div class="col-m-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Manter-se conectado') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-m-8 m-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Problemas para se conectar? <u>Clique aqui</u>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            @if (Route::has('register'))
                                <div class="col-md-12 text-left register_link">
                                    Não possui uma conta? <a href="{{ route('register') }}">Cadastre-se</a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
