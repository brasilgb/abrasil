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
        <table>
            <tr>
                <td><img class="logo" src="{{ asset('img/' . $empresa['logo']) }}" title="{{ $empresa['empresa'] }}">
                </td>
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
        </table>
    </div>
        <table>
            <tr><td colspan="2">Ordem de serviço n°: {{ $ordens['id_ordem'] }}</td></tr>
            <tr><td style="width: 50%">Cliente: {{ $ordens->clientes->cliente }}</td><td>Entrada: {{ formatDateTime($ordens['created_at']) }} - {{ formatDateTime($ordens['created_at'],"H:i") }}</td></tr>
            <tr><td>Tel/Cel: {{ $ordens->clientes->telefone }} / {{ $ordens->clientes->celular }}</td><td>Endereço: {{ $ordens->clientes->logradouro }}, {{ $ordens->clientes->numero }}</td></tr>
            <tr><td>Bairro: {{ $ordens->clientes->bairro }}</td><td>Cidade: {{ $ordens->clientes->cidade }}</td></tr>
            <tr><td>Equipamento: {{ $ordens['equipamento'] }}</td><td>Modelo: {{ $ordens['modelo'] }}</td></tr>
            <tr>
                <td colspan="2">
                    <h4>Serviços solicitados:</h4>
                    <p>{{ $ordens['defeito'] }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>{!! html_entity_decode($mensagem['recebimento_recibo']) !!}</p>
                </td>
            </tr>
        </table>

</body>

</html>
