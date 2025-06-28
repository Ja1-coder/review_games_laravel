<!-- Botão para abrir o modal -->
<div class="d-grid justify-content-end mt-4 mb-3">
    <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modalCriarReview">
        Nova Análise
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCriarReview" tabindex="-1" aria-labelledby="modalCriarReviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <form id="formCriarReview">
                @csrf
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title pixel-font" id="modalCriarReviewLabel">Nova Análise de Jogo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="game_title" class="form-label fw-medium">Título do jogo</label>
                        <input type="text" name="game_title" id="game_title" class="form-control w-100" required>
                    </div>

                    <div class="mb-3">
                        <label for="game_image" class="form-label fw-medium">URL da imagem</label>
                        <input type="text" name="game_image" id="game_image" class="form-control w-100">
                    </div>

                    <div class="mb-3">
                        <label for="game_rating" class="form-label fw-medium">Nota (1 a 10)</label>
                        <input type="number" name="game_rating" id="game_rating" class="form-control w-25" min="1" max="10" required>
                    </div>

                    <div class="mb-3">
                        <label for="game_status" class="form-label fw-medium">Status</label>
                        <select name="game_status" id="game_status" class="form-select w-50" required>
                            <option value="null">Selecionar status</option>
                            <option value="Zerado">Zerado</option>
                            <option value="Jogando">Jogando</option>
                            <option value="Dropado">Dropado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-medium">Categoria</label>
                        <select name="category_id" id="category_id" class="form-select w-50" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="platform_id" class="form-label fw-medium">Plataforma</label>
                        <select name="platform_id" id="platform_id" class="form-select w-50" required>
                            @foreach($plataformas as $plataforma)
                                <option value="{{ $plataforma->id }}">{{ $plataforma->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="game_duration" class="form-label fw-medium">Tempo de jogo (ex: 45h)</label>
                        <input type="text" name="game_duration" id="game_duration" class="form-control w-25">
                    </div>

                    <div class="mb-3">
                        <label for="game_description" class="form-label fw-medium">Análise</label>
                        <textarea name="game_description" id="game_description" rows="8" class="form-control w-100" required></textarea>
                    </div>
                </div>

                <div class="modal-footer border-top-0 d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Publicar Análise</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#formCriarReview').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('createReview') }}",
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
                $('#modalCriarReview').modal('hide');
                $('#formCriarReview')[0].reset();
                location.reload(); // ou atualize a lista de análises via JS
            },
            error: function(xhr, status, error) {
                console.error("Erro AJAX:", xhr);

                let msg = 'Erro ao criar análise:\n';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;
                    for (let campo in errors) {
                        msg += `- ${errors[campo][0]}\n`;
                    }
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg += `- ${xhr.responseJSON.message}`;
                } else {
                    msg += `- ${xhr.status} ${xhr.statusText}\n${xhr.responseText}`;
                }

                alert(msg);
            }

        });
    });
</script>

