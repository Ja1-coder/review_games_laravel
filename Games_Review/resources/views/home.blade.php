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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            @include('Modal.createReview')

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
                                <a class="dropdown-item" href="{{ route('perfil', ['slug' => Auth::user()->user_gamertag]) }}">
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
            @foreach($analises as $analise)
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-auto">
                            <img src="{{ $analise->game_image }}" alt="{{ $analise->game_title }}" class="game-cover rounded">
                        </div>

                        <div class="col">
                            <h5 class="card-title mb-2">{{ $analise->game_title }}</h5>
                            <div class="mb-3">
                                <span class="badge bg-secondary me-2">{{ $analise->plataforma->name ?? 'Plataforma Desconhecida' }}</span>
                                <span class="badge badge-outline">{{ $analise->categoria->name ?? 'Categoria Desconhecida' }}</span>
                            </div>
                        </div>
                        @if(Auth::check() && $analise->user->user_gamertag == Auth::user()->user_gamertag)
                            <div class="col text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="#" class="btn btn-outline-light btn-sm">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    @include('Modal.deleteReview')
                                </div>
                            </div>
                        @endif

                    </div>
                    
                    <p class="text-light mb-4 mt-2">
                        {{ $analise->game_description }}
                    </p>
                    
                    <div class="d-flex align-items-center justify-content-between pt-3 border-top border-purple">
                        <div class="d-flex align-items-center">
                            <img src="{{$analise->user->user_image}}" alt="{{$analise->user->user_name}}" class="rounded-circle me-2" width="32" height="32">
                            <div>
                                <div class="text-light fw-medium">{{ $analise->user->user_name }}</div>
                                <small class="text-light">{{ $analise->user->user_gamertag }}</small>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center text-light small">
                            <span class="me-3">
                                <i class="bi bi-clock me-1"></i> {{$analise->game_duration}}h
                            </span>
                            <span class="me-3">
                                <i class="bi bi-calendar me-1"></i> {{ $analise->created_at->diffForHumans() }}
                            </span>
                            <span class="me-3 cursor-pointer hover-red like-button" 
                                data-id="{{ $analise->id }}"
                                data-liked="{{ auth()->check() && auth()->user()->likes->contains('review_id', $analise->id) ? '1' : '0' }}">

                                <i class="bi 
                                    {{ auth()->check() && auth()->user()->likes->contains('review_id', $analise->id) 
                                        ? 'bi-heart-fill text-danger' 
                                        : 'bi-heart' }}">
                                </i>

                                <span class="like-count">{{ $analise->review_likes }}</span>
                            </span>

                            <span class="cursor-pointer hover-purple">
                                <i class="bi bi-chat me-1"></i> 23
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<script>
    $('.like-button').on('click', function () {
        const span = $(this);
        const reviewId = span.data('id');
        const liked = span.data('liked');

        $.ajax({
            url: `/review/${reviewId}/like`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Atualiza o número de likes
                span.find('.like-count').text(response.likes);

                // Troca o ícone
                const icon = span.find('i');
                if (response.liked) {
                    icon.removeClass('bi-heart').addClass('bi-heart-fill text-danger');
                    span.data('liked', 1);
                } else {
                    icon.removeClass('bi-heart-fill text-danger').addClass('bi-heart');
                    span.data('liked', 0);
                }
            },
            error: function() {
                console.error('Erro ao enviar like');
            }
        });
    });
</script>
</body>
</html>
