@vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <div class="card text-bg mb-3 mt-4 shadow container">
        <div class="card-header d-flex justify-content-between">
            <span>Login</span>
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
    <form action="{{route('login.auth')}}" method="post" class="row g-3">
        @csrf
            <div class="col-12">
                <label for="email" class="form-label">email</label>
                <input class="form-control" name="email" placeholder="Escreva seu email">
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Senha</label>
                <input class="form-control" type="password" name="password" placeholder="Escreva sua senha">
            </div>
            <div class="col-12 d-flex align-items-center">
                <button class="btn btn-success m-3" type="submit">Entrar</button>
                ou
                    <a href="{{route('login.create')}}" class="btn btn-danger m-3">Registre-se</a>
            </div>
    </form>
</div>




