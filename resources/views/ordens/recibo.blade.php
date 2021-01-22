
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recibo</title>
    <link rel="stylesheet" href="{{ asset('css/relatorios.css') }}">
</head>
<body>
<div class="container">
            <!-- Ordem de entrega. -->
<table class="">
    <tr>
        <td><img class="logo" src="{{ asset('img/' . $empresa['logo']) }}" title="{{ $empresa['empresa'] }}"></td>
        <td class="center">
            {{ $empresa['empresa'] }}<br>
            {{ 'CNPJ: ' . $empresa['cnpj'] }} -
            {{ $empresa['endereco'] }},
            {{ $empresa['bairro'] }}<br>
            {{ $empresa['cidade'] }},
            {{ $empresa['uf'] }} <br>
            {{ $empresa['site'] }}
            {{ $empresa['email'] }},<br>
            {{ $empresa['telefone'] }}
        </td>
    </tr>
    <tr>


    </tr>
</table>

</div>
</body>
</html>
