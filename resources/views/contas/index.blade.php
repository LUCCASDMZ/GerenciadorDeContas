@extends('layouts.admin')
@section('content')

<div class="card mt-4 mb-4 border-light shadow">
    <div class="card-header d-flex justify-content-between">
        <span> Listar Contas</span>
        <span>
            <a href="{{ route('conta.create')}}">
                <button class="btn btn-success btn-sm">Cadastrar</button><br>
            </a>
        </span>
    </div>

    @forelse ($contas as $conta)

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$conta->id}}</th>
                    <td>{{$conta->nome}}</td>
                    <td>R$ {{ number_format($conta->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('conta.show', ['conta' => $conta->id])}}">Visualizar</a>
                        <a class="btn btn-warning" href="{{route('conta.edit', ['conta' => $conta->id])}}">Editar</a>
                        <form action="{{route('conta.destroy', ['conta' => $conta->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja apagar esse registro?'">Apagar</button>
                        </form>
                    </td>
                </tr>
                </tbody>
                </table>
        </div>
    @empty
        <span style="color: #f00">
            Nenhuma conta encontrada!
        </span>
    @endforelse
    </div>

        {{-- Verificar se existe a sessão success e imprime o valor --}}
        @if (session('success'))
        <span style="color: #082">
            {{session('success')}}
        </span><br><br>
        @endif
@endsection
