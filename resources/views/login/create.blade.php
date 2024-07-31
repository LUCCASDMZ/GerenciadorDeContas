@vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <div class="card text-bg mb-3 mt-4 shadow container">
        <div class="card-header d-flex justify-content-between">
            <span>Registre-se</span>
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
    <form action="{{route('create.user')}}" method="post" class="row g-3">
        @csrf
            <div class="col-12">
                <label for="nome" class="form-label">Nome</label>
                <input class="form-control" name="nome" placeholder="Escreva seu nome">
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Escreva seu email">
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Senha</label>
                <input class="form-control" type="password" name="password" placeholder="Escreva sua senha">
            </div>
            <div class="col-12 d-flex align-items-center">
                <button class="btn btn-success m-3" type="submit">Registre-se</button>
            </div>
    </form>
</div>




