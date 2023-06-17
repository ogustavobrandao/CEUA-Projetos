@extends('layouts.app')

@section('content')
    <div class="container-fluid align-items-center justify-content-center min-vh">
        <div class="row justify-content-center">
            <div class="col-6" style="margin-top: 100px">
                <div class="card">
                    <div class="card-header font-weight-bold">Redefinição de Senha</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-2">
                                <div class="col-12">
                                    <label for="email"
                                           class="text-black-50">E-Mail</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12">
                                    <label for="password"
                                           class="text-black-50">Nova Senha</label>

                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="password-confirm"
                                           class="text-black-50">Confirmar Nova Senha</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn navbar_color text-white">
                                        Redefinir Senha
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
