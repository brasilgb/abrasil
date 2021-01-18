<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
    <style>
       html, body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}
.container {
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap-reverse;
    flex-direction: row-reverse;
/* alinha o último item a esquerda */
    justify-content: flex-end;
}
.box {
    border: 1px solid #000;
    height: 100px;
    width:calc(100% / 6);
    box-sizing: border-box;
}
    </style>
</head>

<body>


<div class="container">
        @for ($i = $inicial; $i <= $final; $i++)
        <div class="box">
        {{ $empresa['empresa'] }}
        {{ $i++ }}
        {{ $empresa['telefone'] }}
        </div>
        @endfor
</div>

</body>
</html>
