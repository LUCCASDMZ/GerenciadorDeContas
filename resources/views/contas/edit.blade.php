@extends('layouts.admin')
@section('content')


    <div class="card text-bg mb-3 mt-4 shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Editar Conta</span>
            <span>
                <a href="{{route('conta.index')}}"><button class="btn btn-primary">Listar</button></a>
                <a class="btn btn-primary" href="{{route('conta.show',['conta'=> $conta->id])}}">Visualizar</a>
            </span>
    </div>

    {{-- Verificar se existe a sessão success e imprime o valor --}}
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire('erro', "{{ session('error') }}", 'error')})
        </script>
    @endif

    <x-alert />

    <div class="card-body">
        <form action="{{ route('conta.update', ['conta' => $conta->id ] )}}" method="post" class="row g-3">
            @csrf
            @method('put')

            <div class="col-12">
                <label for="nome" class="form-label">Nome</label>
                <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da conta" value="{{old('nome', $conta->nome)}}">
            </div>

            <div class="col-12">
                <label for="valor" class="form-label">Valor</label>
                <input class="form-control" type="text" name="valor" id="valor" placeholder="Usar '.' separar real do centavo" value="{{old('valor', isset($conta->valor) ? number_format($conta->valor, '2', ',', '.'): '')}}">
            </div>

            <div class="col-12">
                <label for="vencimento" class="form-label">Vencimento</label>
                <input class="form-control" type="date" name="vencimento" id="vencimento" value="{{old('vencimento', $conta->vencimento)}}">
            </div>

            <div class="col-12">
                <button class="btn btn-success btn-sm" type="submit">Salvar</button>
            </div>
        </form>
    </div>
@endsection
