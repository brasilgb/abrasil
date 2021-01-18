<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
    <style>
        .container{
            width: 100%;
            display: inline;
        }
        .tags {
            display: flex;
            flex-flow: row wrap;
        }
        .coluna {
    width: 20%;
        }
    </style>
</head>

<body>


<div class="container">
        @for ($i = $inicial; $i <= $final; $i++)
        <div class="tags">
        <div class="coluna">{{ $empresa['empresa'] }}
        {{ $i++ }}
        {{ $empresa['telefone'] }}</div>
        </div>
        @endfor
</div>

</body>
</html>
