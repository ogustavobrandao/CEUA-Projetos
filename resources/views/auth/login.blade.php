@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center borda-bottom">Login</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row justify-content-center mt-2">
            <div class="col-sm-10">
                <label for="email">Email:</label>
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
            <div class="col-sm-10">
                <label for="password">{{ __('Senha') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Lembre-se de mim') }}
                    </label>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <button type="submit" class="btn btn-primary w-75" >
                    {{ __('Entrar') }}
                </button>
            </div>
            <div class="col-md-3 m-0">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}" style="float: right">
                        {{ __('Esqueceu a senha ?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
