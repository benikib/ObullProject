<!-- Modal de Suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Vous etes sur de vouloir supprime?</p>
      </div>
      <div class="modal-footer">
        <form id="deleteForm" action="{{ route('eleves_destroy') }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="hidden" name="id" id="deleteUserId">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
