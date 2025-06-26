@extends('Layout.MasterWithoutMenu')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="shadow-lg">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4 pixel-font">Login</h3>
                    <form method="POST" action="{{ route('postLogin') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="login" class="form-label text-white">Email ou Gamertag</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="login" 
                                name="login" 
                                placeholder="Digite seu email ou gamertag" 
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Senha</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="Digite sua senha" 
                                required
                                minlength="6"
                            />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                        </div>
                        <div class="text-center mt-3">
                            <p class="text-white">Ainda não possui uma conta? <a href="{{ route('cadastro') }}">Crie uma</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
