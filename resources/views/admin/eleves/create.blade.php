<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une option</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  action="{{ route('eleves_store')}}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom </label>
                  <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="intitule">
                  <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"> Postnom </label>
                    <input type="text" name="postnom" class="form-control" id="exampleInputEmail1" aria-describedby="intitule">
                    <div id="emailHelp" class="form-text"></div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Prenom </label>
                    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="intitule">
                    <div id="emailHelp" class="form-text"></div>
                  </div>
                  <div for="inlineRadio1" class="form-label">Sexe: </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="M">
                    <label class="form-check-label" for="inlineRadio1">M</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="F">
                    <label class="form-check-label" for="inlineRadio2">F</label>
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
