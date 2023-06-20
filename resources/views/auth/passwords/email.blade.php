@extends('layouts.app')

@section('content')
    <div class="container-fluid align-items-center justify-content-center min-vh">
        <div class="row justify-content-center">
            <div class="col-6" style="margin-top: 100px">
                <div class="card shadow">
                    <div class="card-header font-weight-bold">Email de redefinição</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="email" class="text-black-50">E-Mail</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn navbar_color text-white">
                                        Enviar E-Mail
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
