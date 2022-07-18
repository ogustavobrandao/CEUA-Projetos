@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center borda-bottom">Cadastro de Instituição</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('instituicao.store') }}">
        @csrf
        <div class="row justify-content-center mt-2">
            <div class="col-sm-10">
                <label for="nome">Nome da Instituição:</label>
                <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="nome" name="nome" value="{{ old('nome') }}" required autocomplete="nome"
                       autofocus>
                @error('nome')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-secondary w-100">
                    {{ __('Voltar') }}
                </button>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Cadastrar') }}
                </button>
            </div>
        </div>
    </form>
@endsection
