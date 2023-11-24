@extends('layouts.components.navbar')

@section('navbar-links')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('instituicao.index') }}" style="color: white;">{{ __('Instituições') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('solicitacao.admin.index') }}" style="color: white;">{{ __('Solicitações') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('usuarios.index') }}" style="color: white;">{{ __('Usuários') }}</a>
    </li>
@endsection
