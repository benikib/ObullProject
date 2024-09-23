<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une option</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  action="{{ route('branch_store')}}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom de l'option</label>
                  <input type="text" name="intitule" class="form-control" id="exampleInputEmail1" aria-describedby="intitule">
                  <div id="emailHelp" class="form-text"></div>
                </div>


                 </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save </button>
        </form>
        </div>
      </div>
    </div>
  </div>
