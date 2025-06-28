<!-- Botão que abre o modal -->
<button class="btn btn-outline-danger btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#modalExcluirReview{{ $analise->id }}">
    <i class="bi bi-trash"></i> Excluir
</button>

<!-- Modal -->
<div class="modal fade" id="modalExcluirReview{{ $analise->id }}" tabindex="-1" aria-labelledby="modalExcluirReviewLabel{{ $analise->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="modalExcluirReviewLabel{{ $analise->id }}">Excluir Análise</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body d-flex justify-content-start">
                <p class="fw-medium">
                    Tem certeza que deseja excluir a análise do jogo
                    <span class="text-warning fw-bold">"{{ $analise->game_title }}"</span>?
                </p>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btn-confirm-delete"
                        data-id="{{ $analise->id }}"
                        data-url="{{ route('deleteReview', $analise->id) }}">
                    Excluir
                </button>
            </div>
        </div>
    </div>
</div>
