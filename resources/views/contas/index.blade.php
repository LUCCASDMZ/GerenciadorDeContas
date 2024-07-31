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


@if (session('success'))
    <div class="alert alert-success m-3" role="alert">
        {{session('success')}}
    </div>
@endif
<div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Vencimento</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($contas as $conta)
            <tr>
                <td>{{$conta->id}}</td>
                <td>{{$conta->nome}}</td>
                <td>R$ {{ number_format($conta->valor, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }}</td>

                <td class="d-md-flex justify-content-center">
                    <a class="btn btn-primary btn-sm me-1" href="{{route('conta.show', ['conta' => $conta->id])}}">Visualizar</a>
                    <a class="btn btn-warning btn-sm me-1" href="{{route('conta.edit', ['conta' => $conta->id])}}">Editar</a>

                    <form action="{{route('conta.destroy', ['conta' => $conta->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm me-1" type="submit"
                            onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
            <span style="color: #f00">
                Nenhuma conta encontrada!
            </span>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
