<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APP - SOS</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/local.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.min.css') }}">

</head>

<body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#3E68AC;">
        <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="{{ (request()->is('/*')) ? 'active' : '' }} nav-link"  href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="{{ (request()->is('clientes*')) ? 'active' : '' }} nav-link" href="{{route('clientes.index')}}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="{{ (request()->is('ordens*')) ? 'active' : '' }} nav-link" href="{{route('ordens.index')}}">Ordens</a>
                </li>
                <li class="nav-item">
                    <a class="{{ (request()->is('agendamentos*')) ? 'active' : '' }} nav-link" href="{{route('agendamentos.index')}}">Agendamentos</a>
                </li>
                <li class="nav-item">
                    <a class="{{ (request()->is('pecas*')) ? 'active' : '' }} nav-link" href="{{route('pecas.index')}}">Peças</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="{{ (request()->is('configuracoes*')) ? 'active' : '' }} nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Configurações</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{route('backups.index')}}"><i class="fa fa-caret-right"></i> Backup</a>
                        <a class="dropdown-item" href="{{route('empresas.index')}}"><i class="fa fa-caret-right"></i> Empresa</a>
                        <a class="dropdown-item" href="{{route('emails.index')}}"><i class="fa fa-caret-right"></i> E-mail</a>
                        <a class="dropdown-item" href="{{route('ferramentas.index')}}"><i class="fa fa-caret-right"></i> Ferramentas</a>
                        <a class="dropdown-item" href="{{route('usuarios.index')}}"><i class="fa fa-caret-right"></i> Usuários</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Relatórios</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="relatorios.clientes"><i class="fa fa-caret-right"></i> Clientes</a>
                        <a class="dropdown-item" href="relatorios.ordens"><i class="fa fa-caret-right"></i> Ordens</a>
                        <a class="dropdown-item" href="relatorios.agendamentos"><i class="fa fa-caret-right"></i> Agendamentos</a>
                        <a class="dropdown-item" href="relatorios.pecas"><i class="fa fa-caret-right"></i> Peças</a>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Usuário Corrente</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="relatorios.clientes"><i class="fa fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="relatorios.ordens"><i class="fa fa-sign-out-alt"></i> Sair</a>
                    </div>
                </li>
            </ul>
        </div>
       </div>
    </nav>

    <div id="main" class="flex-shrink-0">
    <div class="container">

            @yield('content')

        </div>
    </div><!-- /.container -->
    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-gray">ABRASIL-SOS</span>
      </div>
    </footer>
</body>
<script>

</script>
</html>
