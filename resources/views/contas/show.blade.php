@extends('layouts.admin')
@section('content')

    <a href=" {{route('conta.index')}} ">
        <button>Listar</button><br>
    </a><br>
    <a href="{{ route('conta.edit', ['conta' => $conta->id])}}">
        <button>Editar</button>
    </a><br>

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

@endsection
