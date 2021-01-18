<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
<style>
    .card {
  background-color: #fff;
  box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
  border-radius: 4px;
  display: flex;
  flex-direction: line;
  justify-content: center;
}
</style>
</head>

<body>

        
        @for ($i = $inicial; $i <= $final; $i++)

        <div class="card">
        <div class="nomempresa">{{ $empresa['empresa'] }}</div>
        <div class="numordem">{{ $i }}</div>
        <div class="telempresa">{{ $empresa['telefone'] }}</div>
      
        @endfor
           
</body>

</html>