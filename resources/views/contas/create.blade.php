@extends('layouts.admin')
@section('content')

    <a href=" {{route('conta.index')}} ">
        <button>Listar</button>
    </a>

    <h1>Cadastrar conta</h1><br>

    @if ($errors->any())
        <span style="color: #f00">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </span>
        <br>
    @endif

    @if (session('error'))
    <span style="color: #f00">
        {{session('error')}}
    </span><br><br>
    @endif

    <form action="{{ route('conta.store' )}}" method="post">
        @csrf
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome da conta" value="{{old('nome')}}"><br><br>

        <label>Valor: </label>
        <input type="text" name="valor" id="valor" placeholder="Usar '.' separar real do centavo" value="{{old('valor')}}"><br><br>

        <label>Vencimento: </label>

        <input type="date" name="vencimento" id="vencimento" value="{{old('vencimento')}}"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

@endsection
