<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games Review</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Ícone do usuário -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Meu Css -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm borda-inferior py-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-gold pixel-font" href="#"> GamesReview</a>

            <!-- Search bar -->
            <form class="d-flex mx-auto w-50" method="GET" action="/buscar">
                <div class="position-relative w-100">
                    <input 
                        type="search" 
                        class="form-control ps-5 custom-search-input" 
                        placeholder="Buscar jogos ou análises..." 
                        name="q"
                    >
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                </div>
            </form>

            <!-- Nova Análise -->
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#novaAnaliseModal"> Nova Análise
            </button>

            <!-- Ícone do usuário -->
            @if (Auth::check())
                <div class="d-flex">
                    <!-- Dropdown de Perfil -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" role="button" id="dropdownPerfil" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2 text-gold">{{ Auth::user()->user_name }}</span>
                            <img src="{{ Auth::user()->user_image }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownPerfil">
                            <li>
                                <a class="dropdown-item" href="{{ route('perfil', ['slug' => Auth::user()->user_gametag]) }}">
                                    Meu Perfil
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
            @else
                <div class="d-flex">
                    <a href="{{route('login')}}" class="nav-link text-white"><i class="bi bi-box-arrow-in-right me-1"></i>Entrar</a>
                </div>
            @endif
        </div>
    </nav>

    <!-- Header -->
    <header class="text-white text-center py-4">
        <h2 class="pixel-font p-3 text-gold">Compartilhe suas análises e opiniões sobre seus jogos favoritos</h2>
    </header>

    <!-- Cards de análises -->
    <div class="container mt-5">
        <div class="row row-cols-1 g-4">

            <!-- Cards -->
            <div class="card-body">
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

</body>
</html>
