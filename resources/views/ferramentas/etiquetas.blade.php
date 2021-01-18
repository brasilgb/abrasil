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

}
.box {
    float: left;
    margin-right: 110px;
    width: 22%;
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
