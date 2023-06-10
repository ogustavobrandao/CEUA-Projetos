@extends('layouts.app')
@section('login')
    <style>
        .home_background {
            width: 80%;
            height: 100%;
            min-height: 400px;
            background-image: url({{asset('images/CEUA_logo_vinho.png')}});
            background-repeat: no-repeat;
            background-position: center;
            background-size: 80%;
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

    <div class="container-fluid my-5 pb-5">
        <div class="row">
            <div class="col-md-6 p-0 d-flex justify-content-center align-items-center">
                <div class="home_background">
                </div>
            </div>

            <div class="col-md-5 ml-4 p-0">
                <div class="login_form d-flex align-items-center justify-content-center">
                    <div class="col-12">

                        <form class="shadow p-5 bg-cinza" method="POST" action="{{ route('login') }}">
                            <h3>Entrar</h3>
                            <hr class="bg-secondary w-80 mt-3">
                            @csrf
                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-12">
                                    <label class="text-black-50" for="email">E-mail:</label>
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
                                    <label class="text-black-50" for="password">{{ __('Senha') }}</label>
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
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Manter-se conectado') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-center ">
                                    @if (Route::has('password.request'))
                                        <a class="form-check-label text-black" href="{{ route('password.request') }}"
                                           style="color: #fff;">
                                            Problemas para se conectar? <u class="form-check-label text-primary">Clique
                                                aqui</u>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-center pl-0">
                                    <button type="submit" class="btn w-75 navbar_color text-white font-weight-bold">
                                        {{ __('Entrar') }}
                                    </button>
                                </div>
                                @if (Route::has('register'))
                                    <div class="col-md-6 text-center pr-0">
                                        <a href="{{ route('register') }}"
                                           class="btn w-75 color_bt-cadastrar font-weight-bold">
                                            Cadastar-se
                                        </a>
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
