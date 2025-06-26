@extends('Layout.MasterWithoutMenu')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex align-items-center justify-content-center">
    <div class="shadow-lg w-100" style="max-width: 480px;">
        <div class="card-body">
            <div class="text-center">
                <h1 class="card-title h3 pixel-font">Registre-se</h1>
                <p class="card-text text-white">Preencha o formulário abaixo para criar uma conta</p>
            </div>
            <div class="mt-4">
                <form action="{{ route('postCadastro') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label text-white">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-4">
                        <label for="gametag" class="form-label text-white">Gamertag</label>
                        <input type="text" class="form-control" id="gametag" name="gametag" required>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label text-white">URL da imagem</label>
                        <input type="text" class="form-control" id="image" name="image" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label text-white">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-white">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label text-white">Confirmar Senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection