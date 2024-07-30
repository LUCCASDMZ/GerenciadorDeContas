@extends('layouts.admin')
@section('content')

    <a href=" {{route('conta.index')}} ">
        <button>Listar</button>
    </a>

    <h1>Editar a conta</h1>

    @if ($errors->any())
    <span style="color: #f00">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </span>
    <br>
    @endif

    {{-- Verificar se existe a sessão success e imprime o valor --}}
    @if (session('error'))
    <span style="color: #f00">
        {{session('error')}}
    </span><br><br>
    @endif

    <form action="{{ route('conta.update', ['conta' => $conta->id ] )}}" method="post">
        @csrf
        @method('put')
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome da conta" value="{{old('nome', $conta->nome)}}"><br><br>

        <label>Valor: </label>
        <input type="text" name="valor" id="valor" placeholder="Usar '.' separar real do centavo" value="{{old('valor', isset($conta->valor) ? number_format($conta->valor, '2', ',', '.'): '')}}"><br><br>

        <label>Vencimento: </label>

        <input type="date" name="vencimento" id="vencimento" value="{{old('vencimento', $conta->vencimento)}}"><br><br>

        <button type="submit">Salvar</button>
    </form>

@endsection
