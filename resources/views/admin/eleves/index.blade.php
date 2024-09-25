@extends('layouts_admin.app')
@section('content')


    <div class="container-fluid py-4">

<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Ajouter une eleve
  </button>

  <!-- Modal -->
 @include('admin.eleves.create')
 @include('admin.eleves.edit')
 @include('admin.eleves.delete')
        <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Authors table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom & Postnom Prenom</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sexe</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de la creation </th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ( $eleves as $eleve)
                       <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="px-2">
                             {{$eleve->id }}
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $eleve->nom. " ".$eleve->prenom ." ".$eleve->postnom }}</h6>

                            </div>
                          </div>
                        </td>

                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $eleve->sexe }}</span>
                          </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{ $eleve->created_at }}</span>
                        </td>
                        <td class="align-middle">
                            <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="openEditModal({{ $eleve->id }}, '{{ $eleve->nom}}','{{ $eleve->postnom}}','{{ $eleve->prenom}}'),'{{ $eleve->sexe}}'">
                                    Edit
                                </a>
                                <td class="align-middle">
                                    <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete" onclick="openDeleteModal({{ $eleve->id }})">
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
        function openEditModal(userId, nom,postnom,prenom,sexe) {
            // Remplir le formulaire avec les données de l'utilisateur
            document.getElementById('userId').value = userId;
            document.getElementById('nom').value = nom;
            document.getElementById('prenom').value = prenom;
            document.getElementById('postnom').value = postnom;
            document.getElementById('sexe').value = sexe; 

            // Ouvrir le modal
            $('#editModal').modal('show');

        }
        </script>
        <script>
            function openDeleteModal(userId) {
                // Assigner l'ID de l'utilisateur au formulaire de suppression
                document.getElementById('deleteUserId').value = userId;
              
                // Ouvrir le modal
                $('#deleteModal').modal('show');
            }
            </script>



@endsection
