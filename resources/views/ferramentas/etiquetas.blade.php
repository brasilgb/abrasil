
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>

        @for ($i = $inicial; $i <= $final; $i++)
<div class="position:fixed">
        <div style="width:100px; height:100px;float:left;" width="124"  height="65">
        <div class="nomempresa">{{ $empresa['empresa'] }}</div>
        <div class="numordem">{{ $i++ }}</div>
        <div class="telempresa">{{ $empresa['telefone'] }}</div>
        </div>
    </div>
        @endfor 


</body>
</html>
