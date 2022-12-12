@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card shadow-lg p-3 bg-white col-8" style="border-radius: 10px">
            <div class="row mb-4 mt-2 borda-bottom">
                <div class="col-md-12">
                    <h3 class="text-center">Editar Senha</h3>
                </div>
            </div>

            <form method="POST" action="{{ route('user.senha.alterar') }}">
                @csrf

                <div class="row justify-content-center mt-2">
                    <div class="col-sm-5">
                        <label for="password">Nova Senha:</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="password"
                               type="password"
                               name="password" value="" required autocomplete="password"
                               autofocus>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-sm-5">
                        <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
