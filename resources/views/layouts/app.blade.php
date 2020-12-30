<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APP - SOS</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/local.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clientes.index')}}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ordens.index')}}">Ordens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('agendamentos.index')}}">Agendamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pecas.index')}}">Peças</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Configurações</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{route('backups.index')}}">Backup</a>
                        <a class="dropdown-item" href="{{route('empresas.index')}}">Empresa</a>
                        <a class="dropdown-item" href="{{route('emails.index')}}">E-mail</a>
                        <a class="dropdown-item" href="{{route('ferramentas.index')}}">Ferramentas</a>
                        <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuários</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Relatórios</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="relatorios.clientes">Clientes</a>
                        <a class="dropdown-item" href="relatorios.ordens">Ordens</a>
                        <a class="dropdown-item" href="relatorios.agendamentos">Agendamentos</a>
                        <a class="dropdown-item" href="relatorios.pecas">Peças</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div id="main" class="flex-shrink-0">
    <div class="container">

            @yield('content')

        </div>
    </div><!-- /.container -->
    <footer class="footer mt-auto py-3 bg-primary">
      <div class="container">
        <span class="text-white">fsdfggsdgdgdgsgdsgg.</span>
      </div>
    </footer>
</body>

</html>
