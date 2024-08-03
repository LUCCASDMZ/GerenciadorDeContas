@extends('layouts.admin')
@section('content')

    <div class="card text-bg mb-3 mt-4 shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar conta</span>
            <span>
                <a href="{{route('conta.index')}}"><button class="btn btn-primary">Listar</button></a>
            </span>
    </div>

    <x-alert />

    <div class="card-body">
        <form action="{{ route('conta.store' )}}" method="post" class="row g-3">
            @csrf

                    <div class="col-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da conta" value="{{old('nome')}}">
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="valor" class="form-label">Valor</label>
                        <input class="form-control" type="text" name="valor" id="valor" placeholder="Usar '.' separar real do centavo" value="{{old('valor')}}">
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="vencimento" class="form-label">Vencimento</label>
                        <input class="form-control" type="date" name="vencimento" id="vencimento" value="{{old('vencimento')}}">
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="situacao_conta_id" class="form-label">Situação da Conta</label>
                        <select name="situacao_conta_id" id="situacao_conta_id" class="form-select">
                            <option value="">Selecione</option>
                            @forelse ($situacoesContas as $situacaoConta)
                                <option value="{{$situacaoConta->id}}" {{old('situacao_conta_id') == $situacaoConta->id ? 'selected' : ''}}>{{$situacaoConta->nome}}</option>
                            @empty
                                <option value="">Nenhuma situação da conta encontrada</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success btn-sm" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </form>
    </div

@endsection
