@extends('layouts.admin')
@section('content')


    <a href="{{ route('conta.create')}}">
        <button>Cadastrar</button><br>
    </a><br>
    <a href=" {{route('site.menu')}} ">
        <button>Voltar</button>
    </a>

    <h1>Listar as contas</h1>

        {{-- Verificar se existe a sessão success e imprime o valor --}}
        @if (session('success'))
        <span style="color: #082">
            {{session('success')}}
        </span><br><br>
        @endif

    @forelse ($contas as $conta)
    ID: {{ $conta->id }} <br>
    Nome: {{ $conta->nome }} <br>
    Valor: R$ {{ number_format($conta->valor, 2, ',', '.') }} <br>
    Vencimento: {{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }} <br><br>

    <a href="{{ route('conta.show', ['conta' => $conta->id ])}}">
        <button>Visualizar</button><br>
    </a><br>
    <a href="{{ route('conta.edit', ['conta' => $conta->id])}}">
        <button>Editar</button><br>
    </a><br>


    <form action="{{ route('conta.destroy', ['conta' => $conta->id])}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button><br>
    </form>


    <br><hr>
    @empty
        <span style="color: #f00">
            Nenhuma conta encontrada!
        </span>

    @endforelse

    @endsection
