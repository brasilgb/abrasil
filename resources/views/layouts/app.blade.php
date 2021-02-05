<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(!empty(showModelTables('\App\Models\Empresa', 'logo')))
    <title>ABSOS - {{ showModelTables('\App\Models\Empresa', 'empresa') }}</title>
    <link rel="shortcut icon" href="{{asset('img/'.showModelTables('App\Models\Empresa', 'logo'))}}">
                @else
                <title>ABSOS</title>
                <link rel="shortcut icon" href="{{asset('img/logo.jpg')}}">
                @endif

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/local.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/local.css') }}">
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">


    @guest
    <style>
        body,
        html {
            background: #60a3bc !important;
        }
    </style>
    @endguest
</head>

<body class="d-flex flex-column h-100">
    @guest

    @else
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class="container">

            <a class="navbar-brand" href="/">
                @if(!empty(showModelTables('\App\Models\Empresa', 'logo')))
                <img class="logo" src="{{ asset('img/'.showModelTables('\App\Models\Empresa', 'logo')) }}" class="brand_logo" alt="Logo">
                @else
                <img class="logo" src="{{ asset('img/logo.jpg') }}" class="brand_logo" alt="Logo">
                @endif
            </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a title="Dashboard" class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="/"><i
                                class="fa fa-tachometer-alt" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <a title="Clientes" class="{{ (request()->is('clientes*')) ? 'active' : '' }} nav-link"
                            href="{{route('clientes.index')}}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a title="Ordens" class="{{ (request()->is('ordens*')) ? 'active' : '' }} nav-link"
                            href="{{route('ordens.index')}}">Ordens</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ (request()->is('agendas*')) ? 'active' : '' }} nav-link"
                            href="{{route('agendas.index')}}">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a title="Peças" class="{{ (request()->is('pecas*')) ? 'active' : '' }} nav-link"
                            href="{{route('pecas.index')}}">Peças</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="{{ (request()->is('configuracoes*')) ? 'active' : '' }} nav-link dropdown-toggle"
                            href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Configurações</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{route('backups.index')}}"><i class="fa fa-caret-right"></i>
                                Backup</a>
                            <a class="dropdown-item" href="{{route('empresas.index')}}"><i
                                    class="fa fa-caret-right"></i> Empresa</a>
                            <a class="dropdown-item" href="{{route('emails.index')}}"><i class="fa fa-caret-right"></i>
                                E-mail</a>
                            <a class="dropdown-item" href="{{route('ferramentas.index')}}"><i
                                    class="fa fa-caret-right"></i> Ferramentas</a>
                            <a class="dropdown-item" href="{{route('usuarios.index')}}"><i
                                    class="fa fa-caret-right"></i> Usuários</a>
                            <a class="dropdown-item" href="{{route('mensagens.index')}}"><i
                                    class="fa fa-caret-right"></i> Mensagens do sistema</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="relatorios.clientes"><i class="fa fa-caret-right"></i>
                                Clientes</a>
                            <a class="dropdown-item" href="relatorios.ordens"><i class="fa fa-caret-right"></i>
                                Ordens</a>
                            <a class="dropdown-item" href="relatorios.agendas"><i class="fa fa-caret-right"></i>
                                Agendamentos</a>
                            <a class="dropdown-item" href="relatorios.pecas"><i class="fa fa-caret-right"></i> Peças</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                            data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"
                                href="{{ route('usuarios.edit', ['usuario' => Auth::user()->id]) }}"><i
                                    class="fa fa-user"></i> Perfil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i> Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endguest

    <div id="main" class="flex-shrink-0">
        <div class="container fadeIn">

            @yield('content')

        </div>
    </div><!-- /.container -->

    @guest

    @else
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span>Copyright © {{ date("Y")}} <a href="https://abrasildigital.com.br/">ABrasil Digital</a>. Todos os
                direitos reservados.</span>
        </div>
    </footer>
    @endguest
</body>
<script>
    $( "#dateform,#searchform").inputmask('99/99/9999');
    $( "#timeform").inputmask('99:99');
    $( ".telefone").inputmask('(99)9999-99999');
    $( ".celular").inputmask('(99)9999-9999');
    $( ".cep").inputmask('99999-999');
    $( ".cpf").inputmask('999999999/99');
    $( ".rg").inputmask('9999999999');
</script>

</html>
