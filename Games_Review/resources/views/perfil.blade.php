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
                        <div class="d-flex  align-items-center gap-3">
                            <form action="{{ route('postPerfil') }}" method="POST" class="w-100">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="nome" class="text-light fw-medium fs-6 mb-2">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control w-50" value="{{ auth()->user()->user_name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="gamertag" class="text-light fw-medium fs-6 mb-2">Gamertag</label>
                                    <input type="text" name="gamertag" id="gamertag" class="form-control w-50" value="{{ auth()->user()->user_gamertag }}">
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
                                    <span class="fw-bold text-light">{{$numeroAnalises}}</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-light">Número de análises</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center">
                                <div>
                                    <span class="fw-bold text-light">{{$numeroCurtidas}}</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-light">Número de curtidas</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center">
                                <div>
                                    <span class="fw-bold text-light">0</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-light">Número de comentários</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-100">
                            <!-- Card -->
                            @foreach($minhasReviews as $analise)
                                <div class="card-body mt-3">
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

                                        <div class="col text-end">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="#" class="btn btn-outline-light btn-sm">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>
                                                @include('Modal.deleteReview')
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 mt-2">
                                        <span class="text-light fw-bold fs-5">Nota: {{ $analise->game_rating }}/10</span>
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
                                                data-liked="{{ auth()->user()->likes->contains('review_id', $analise->id) ? '1' : '0' }}">
                                                <i class="bi {{ auth()->user()->likes->contains('review_id', $analise->id) ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                                                <span class="like-count">{{ $analise->review_likes }}</span>
                                            </span>
                                            <span class="cursor-pointer hover-purple">
                                                <i class="bi bi-chat me-1"></i> 0
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

    $(document).on('click', '.like-button', function () {
        const span = $(this);
        const reviewId = span.data('id');

        $.ajax({
            url: `/review/${reviewId}/like`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                const icon = span.find('i');
                span.find('.like-count').text(response.likes);

                if (response.liked) {
                    icon.removeClass('bi-heart').addClass('bi-heart-fill text-danger');
                    span.data('liked', 1);
                } else {
                    icon.removeClass('bi-heart-fill text-danger').addClass('bi-heart');
                    span.data('liked', 0);
                }
            },
            error: function () {
                console.error('Erro ao enviar like');
            }
        });
    });
    $(document).on('click', '.btn-confirm-delete', function () {
        const reviewId = $(this).data('id');
        const url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function () {
                $('#modalExcluirReview' + reviewId).modal('hide');

                // Remover o container da análise com segurança
                $('#modalExcluirReview' + reviewId)
                    .closest('.card-body')
                    .remove();
            },
            error: function (xhr) {
                console.error(xhr);
                alert('Erro ao excluir análise.');
            }
        });
    });

</script>
@endsection