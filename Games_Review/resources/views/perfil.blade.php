@extends('Layout.MasterWithoutMenu')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light shadow-sm border-bottom py-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white pixel-font" href="#"> GamesReview</a>
        <!-- Dropdown de Perfil -->
        <div class="dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" role="button" id="dropdownPerfil" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-2">{{ Auth::user()->user_name }}</span>
                <img src="{{ Auth::user()->user_image }}" alt="Avatar" class="rounded-circle" width="32" height="32">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownPerfil">
                <li>
                    <a class="dropdown-item" href="{{ route('home') }}">
                        Tela Inicial
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

    </div>
</nav>
<div class="container align-items-center justify-content-center">
    <div class="bg-dark m-6 mt-3 p-3 rounded gap-3">
        <div class="bg-primary m-6 p-3 rounded">
            <div class="gap-3">
                <div>
                    <div>
                        <h3 class="text-light fw-medium pixel-font mb-4">Conta</h3>
                    </div>
                    
                    <div class="gap-3">
                        <div class="mb-4 d-flex align-items-center gap-3">
                            <img id="avatar" src="{{ auth()->user()->user_image }}" alt="Marina" class="rounded-circle" width="100" height="100">
                            <p class="text-light fw-medium fs-3 mb-0">{{ auth()->user()->user_name }}</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <form action="#" class="w-100">
                                <div class="mb-4">
                                    <label for="nome" class="text-light fw-medium fs-6 mb-2">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control w-50" value="{{ auth()->user()->user_name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="gametag" class="text-light fw-medium fs-6 mb-2">Gamertag</label>
                                    <input type="text" name="gametag" id="gametag" class="form-control w-50" value="{{ auth()->user()->user_gametag }}">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="text-light fw-medium fs-6 mb-2">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control w-50" value="{{ auth()->user()->user_email }}">
                                </div>

                                <div class="mb-4">
                                    <label for="imagem" class="text-light fw-medium fs-6 mb-2">Foto de perfil</label>
                                    <input type="text" name="imagem" id="imagem" class="form-control w-50" value="{{ auth()->user()->user_image }}">
                                </div>

                                <div class="d-grid justify-content-end">
                                    <button type="submit" class="btn btn-secundary">Salvar dados</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-primary mt-3 m-6 p-3 rounded">
            <div class="gap-3">
                <div>
                    <div class="d-flex align-items-center justify-content-center">
                        <h4 class="text-light fw-medium pixel-font mb-4">Análises</h4>
                    </div>
                    
                    <div class="">
                        <div class="d-flex align-items-center gap-3">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div>
                                    <span class="fw-bold text-light">3</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-light">Número de análises</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center">
                                <div>
                                    <span class="fw-bold text-light">3</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-light">Número de curtidas</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center">
                                <div>
                                    <span class="fw-bold text-light">3</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-light">Número de comentários</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-100">
                            <!-- Card -->
                            <div class="card-body mt-3">
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="https://m.media-amazon.com/images/I/91kaE4XaeLL._AC_UY327_FMwebp_QL65_.jpg" alt="Zelda" class="game-cover rounded">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title mb-2">The Legend of Zelda: Tears of the Kingdom</h5>
                                        <div class="mb-3">
                                            <span class="badge bg-secondary me-2">Nintendo Switch</span>
                                            <span class="badge badge-outline">Aventura</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="text-light fw-bold fs-5">Nota: 4.8/10</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <p class="text-light mb-4 mt-2">
                                    Uma obra-prima absoluta! A liberdade criativa que o jogo oferece é impressionante. 
                                    O sistema de construção revoluciona completamente a gameplay, permitindo soluções únicas 
                                    para cada desafio...
                                </p>
                                
                                <div class="d-flex align-items-center justify-content-between pt-3 border-top border-purple">
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b647?w=32&amp;h=32&amp;fit=crop&amp;crop=face" alt="Marina" class="rounded-circle me-2" width="32" height="32">
                                        <div>
                                            <div class="text-light fw-medium">Marina Silva</div>
                                            <small class="text-light">@marinagamer</small>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center text-light small">
                                        <span class="me-3">
                                            <i class="bi bi-clock me-1"></i> 45h
                                        </span>
                                        <span class="me-3">
                                            <i class="bi bi-calendar me-1"></i> 2 dias atrás
                                        </span>
                                        <span class="me-3 cursor-pointer hover-red">
                                            <i class="bi bi-heart me-1"></i> 127
                                        </span>
                                        <span class="cursor-pointer hover-purple">
                                            <i class="bi bi-chat me-1"></i> 23
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const inputImagem = document.getElementById('imagem');
    const imgPreview = document.getElementById('avatar');

    inputImagem.addEventListener('input', function () {
        imgPreview.src = this.value;
    });
</script>
@endsection