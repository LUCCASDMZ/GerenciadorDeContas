@extends('layouts.admin')
@section('content')

<div class="card mt-4 mb-4 border-light shadow">
    <div class="card-header d-flex justify-content-between">
        <span>Vizualizar contas</span>
        <span>
            <a href="{{route('conta.index')}}" class="btn btn-info ">Listar</a>
            <a href="{{ route('conta.edit', ['conta' => $conta->id])}}"class="btn btn-warning ">Editar</a>
        </span>
</div>

@if (session('success'))

    <div class="alert alert-success m-3" role="alert">
        {{session('success')}}
    </div>
@endif

<dl class="row card-body">
    <dt class="col-sm-3">ID:</dt>
    <dd class="col-sm-9">{{ $conta->id }}</dd>

    <dt class="col-sm-3">Nome:</dt>
    <dd class="col-sm-9">{{ $conta->nome }}</dd>

    <dt class="col-sm-3">Valor:</dt>
    <dd class="col-sm-9">R$ {{ number_format($conta->valor, 2, ',', '.') }}</dd>

    <dt class="col-sm-3">Vencimento:</dt>
    <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }}</dd>

    <dt class="col-sm-3">Cadastro:</dt>
    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>

    <dt class="col-sm-3">Editado:</dt>
    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>

@endsection
