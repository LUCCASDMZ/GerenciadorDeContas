<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href=" {{route('conta.index')}} ">Listar</a><br>
    <a href="{{ route('conta.edit', ['conta' => $conta->id])}}">Editar</a><br>

    <h1>Detalhes da conta</h1>

    {{-- Verificar se existe a sessão success e imprimir o valor --}}
    @if (session('success'))
    <span style="color: #082">
        {{session('success')}}
    </span><br><br>
    @endif

        ID: {{ $conta->id }} <br>
        Nome: {{ $conta->nome }} <br>
        Valor: R$ {{ number_format($conta->valor, 2, ',', '.') }} <br>
        Vencimento: {{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }} <br>
        Cadastro: {{ \Carbon\Carbon::parse($conta->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }} <br>
        Editado: {{ \Carbon\Carbon::parse($conta->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }} <br><br>

</body>
</html>
