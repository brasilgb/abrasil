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
    <script src="{{ asset('js/local.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/local.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>

            @yield('content')

</body>

</html>
