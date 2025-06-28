<!-- Botão para abrir o modal -->
<a href="#" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarReview{{ $analise->id }}">
    <i class="bi bi-pencil"></i> Editar
</a>

<!-- Modal -->
<div class="modal fade" id="modalEditarReview{{ $analise->id }}" tabindex="-1" aria-labelledby="modalEditarReviewLabel{{ $analise->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <form class="formEditarReview" data-id="{{ $analise->id }}">
                @csrf
                @method('PUT')
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title pixel-font">Editar Análise de Jogo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">Título do jogo</label>
                        <input type="text" name="game_title" class="form-control" value="{{ $analise->game_title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">URL da imagem</label>
                        <input type="text" name="game_image" class="form-control" value="{{ $analise->game_image }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">Nota (1 a 10)</label>
                        <input type="number" name="game_rating" class="form-control w-25" min="1" max="10" value="{{ $analise->game_rating }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">Status</label>
                        <select name="game_status" class="form-select w-50" required>
                            <option value="Zerado" {{ $analise->game_status === 'Zerado' ? 'selected' : '' }}>Zerado</option>
                            <option value="Jogando" {{ $analise->game_status === 'Jogando' ? 'selected' : '' }}>Jogando</option>
                            <option value="Dropado" {{ $analise->game_status === 'Dropado' ? 'selected' : '' }}>Dropado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">Categoria</label>
                        <select name="category_id" class="form-select w-50" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $analise->category_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">Plataforma</label>
                        <select name="platform_id" class="form-select w-50" required>
                            @foreach($plataformas as $plataforma)
                                <option value="{{ $plataforma->id }}" {{ $analise->platform_id == $plataforma->id ? 'selected' : '' }}>
                                    {{ $plataforma->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">Tempo de jogo</label>
                        <input type="text" name="game_duration" class="form-control w-25" value="{{ $analise->game_duration }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-start">Análise</label>
                        <textarea name="game_description" class="form-control" rows="6" required>{{ $analise->game_description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
