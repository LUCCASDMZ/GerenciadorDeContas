<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema</title>
</head>
<body>

    <a href="{{ route('conta.create')}}">Cadastrar</a><br>
    <a href=" {{route('site.menu')}} ">Voltar</a>

    <h1>Listar as contas</h1>

    @forelse ($contas as $conta)
    ID: {{ $conta->id }} <br>
    Nome: {{ $conta->nome }} <br>
    Valor: R$ {{ number_format($conta->valor, 2, ',', '.') }} <br>
    Vencimento: {{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }} <br><br>

    <a href="{{ route('conta.show', ['conta' => $conta->id ])}}">Visualizar</a><br>
    <a href="{{ route('conta.edit', ['conta' => $conta->id])}}">Editar</a><br>
    <a href="{{ route('conta.destroy')}}">Apagar</a>
    
    <br><hr>
    @empty
        <span style="color: #f00">
            Nenhuma conta encontrada!
        </span>
        
    @endforelse

    {{--
    <a href="{{ route('conta.destroy')}}">Apagar</a><br>

    <a href=" {{route('site.menu')}} ">Voltar</a>--}}
    
</body>
</html>