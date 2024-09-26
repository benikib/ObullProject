@extends('layouts_admin.app')
@section('content')


    <div class="container-fluid py-4">

<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Ajouter une classe
  </button>

  <!-- Modal -->
 @include('admin.classe.create')
 @include('admin.classe.edit')
 @include('admin.classe.delete')
        <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6> classe</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom de classe</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option de la classen </th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ( $classes as $classe)
                       <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="px-2">
                             {{$classe->id }}
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $classe->intitule }}</h6>

                            </div>
                          </div>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{ $classe->option }}</span>
                        </td>
                        <td class="align-middle">
                            <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="openEditModal({{ $classe->id }}, '{{ $classe->intitule }}','{{ $classe->option_id }}' )">
                                    Edit
                                </a>
                                <td class="align-middle">
                                    <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete" onclick="openDeleteModal({{ $classe->id }})">
                                        Delete
                                    </a>
                                </td>

                            </td>

                      </tr>

                       @empty

                       @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
    <!-- Inclure le CSS de Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


<!-- Inclure le JS de Bootstrap et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function openEditModal(userId, intitule,option) {
            // Remplir le formulaire avec les données de l'utilisateur
            document.getElementById('userId').value = userId;
            document.getElementById('intitule').value = intitule;


            document.addEventListener("DOMContentLoaded", function() {
        let selectElement = document.getElementById('option_id');
        let options = selectElement.options;

        // Supposons que la variable 'option' soit définie avant l'exécution
         // Vous pouvez tester avec une valeur que vous attendez

        // Parcourir les options
        for (let i = 0; i < options.length; i++) {
            console.log("Option value:", options[i].value);

            if (options[i].value == option) {
                console.log("Sélection trouvée:", options[i].value);
                options[i].selected = true;
            } else {
                options[i].selected = false; // Désélectionner les autres
            }
        }
    });

            // Ouvrir le modal
            $('#editModal').modal('show');
                // Vérifier que le DOM est chargé avant d'exécuter le script


        }


        </script>
        <script>
            function openDeleteModal(classe_id) {
                // Assigner l'ID de l'utilisateur au formulaire de suppression
                document.getElementById('delete_classe_id').value = classe_id;

                // Ouvrir le modal
                $('#deleteModal').modal('show');
            }
            </script>



@endsection
