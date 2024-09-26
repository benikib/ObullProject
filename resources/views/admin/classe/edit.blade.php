<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editForm" action="{{ route('classe_update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="userId">
            <div class="form-group">
              <label for="intitule">Intitulé</label>
              <input type="text" class="form-control" name="intitule" id="intitule" required>
            </div>
            <div class="form-group">
            <select name="option_id"   class="form-select" aria-label="Default select example">

                @forelse ($options as $option )
                <option value={{ $option->id }} >{{ $option->intitule }}</option>
                @empty

                @endforelse
                <option  >aucune</option>
              </select>
            </div>
            <!-- Ajoutez d'autres champs si nécessaire -->
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>


</script>



