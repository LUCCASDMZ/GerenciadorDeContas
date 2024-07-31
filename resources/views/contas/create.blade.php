@extends('layouts.admin')
@section('content')

    <div class="card text-bg mb-3 mt-4 shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar conta</span>
            <span>
                <a href="{{route('conta.index')}}"><button class="btn btn-primary">Listar</button></a>
            </span>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger m-3">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger m-3">
            {{session('error')}}
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route('conta.store' )}}" method="post" class="row g-3">
            @csrf
            
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da conta" value="{{old('nome')}}">
                    </div>

                    <div class="col-12">
                        <label for="valor" class="form-label">Valor</label>
                        <input class="form-control" type="text" name="valor" id="valor" placeholder="Usar '.' separar real do centavo" value="{{old('valor')}}">
                    </div>

                    <div class="col-12">
                        <label for="vencimento" class="form-label">Vencimento</label>
                        <input class="form-control" type="date" name="vencimento" id="vencimento" value="{{old('vencimento')}}">
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success btn-sm" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </form>
    </div

@endsection
