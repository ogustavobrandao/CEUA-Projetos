<nav class="navbar navbar-expand-md navbar-dark navbar_color">

    <a class="navbar-brand ml-4" href="{{ route('solicitacao.admin.index') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">
            @auth()
                @if(Auth::user()->tipo_usuario_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('instituicao.index') }}" style="color: white;">{{ __('Instituições') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('solicitacao.admin.index')}}" style="color: white;">{{ __('Solicitações') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('usuarios.index')}}" style="color: white;">{{ __('Usuários') }}</a>
                    </li>
                @endif
            @endauth
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto mr-4">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('ceua') }}">{{ __('A CEUA') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('membros') }}">{{ __('Membros') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('calendarioReunioes') }}">{{ __('Calendário de reuniões') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('fluxograma_documentos') }}">{{ __('Fluxograma de submissão e documentos') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('leis_decretos') }}">{{ __('Duvidas e legislação') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('sobre') }}">{{ __('Sobre o sistema') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('contato') }}">{{ __('Contato') }}</a>
                    </li>

                @endif


            @else
                <li class="nav-item dropdown">


                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v- style="color: black">
                        <span class="font-weight-bolder">Olá, </span>{{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.perfil.editar') }}"> {{ __('Editar Perfil') }}</a>
                        <a class="dropdown-item" href="{{ route('user.senha.editar') }}"> {{ __('Alterar Senha') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
