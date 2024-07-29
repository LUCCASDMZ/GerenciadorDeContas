<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema</title>
</head>
<body>
    
    <a href=" {{route('conta.index')}} ">Listar</a>

    <h1>Editar a conta</h1>

    <form action="{{route('conta.edit',['conta'=>$conta->id])}}" method="post">
        ID: {{ $conta->id }} <br>
        Nome: {{ $conta->nome }} <br>
        Valor: R$ {{ number_format($conta->valor, 2, ',', '.') }} <br>
        Vencimento: {{\Carbon\Carbon::parse($conta->vencimento)}}
    </form>
</body>
</html>