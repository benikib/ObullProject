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
          <form id="editForm" action="{{ route('eleves_update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="userId">
            <div class="form-group">
              <label for="intitule">nom</label>
              <input type="text" class="form-control" name="nom" id="nom" required>
            </div>
            <div class="form-group">
                <label for="intitule">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" required>
              </div>
              <div class="form-group">
                <label for="intitule">Postnom</label>
                <input type="text" class="form-control" name="postnom" id="postnom" required>
              </div>
              <div class="form-group">
                <label for="sexe">Sexe</label>
                              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="sexe" value="M">
                <label class="form-check-label" for="inlineRadio1">M</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="sexe" value="F">
                <label class="form-check-label" for="inlineRadio2">F</label>
            
            </div>
            <div class="form-group">
                
                
              </div>
            <!-- Ajoutez d'autres champs si nécessaire -->
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
