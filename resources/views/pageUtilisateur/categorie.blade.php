    
    
    <div class="d-flex justify-content-end mb-3" style="margin-top: 50px">
        <!-- Bouton qui ouvre le modal de création de catégorie-->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formModal">Ajouter une catégorie</button>
    </div>

        @if($user->categories->isNotEmpty())
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <div class="col-15"> <!-- ajuste col-12, col-10, col-8 selon largeur souhaitée -->  
                    <div class="table-responsive">
            <table class="table table-bordered text-center align-middle w-100" id="categorie" >
            <thead class="table-dark">
                <tr style="border-bottom: 2px solid #FF4B2B;">
                    <th scope="col">Type de la catégorie</th> 
                    <th scope="col">Nom de la catégorie</th>
                    <th scope="col">Description de la catégorie</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->categories as $category)               
                <tr>
                    <td> {{ $category->type }}</td>
                    <td> {{ $category->nom }}</td>
                    <td> {{ $category->description }}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" class="icon-button edit-button" aria-label="Modifier l'élément" data-bs-target="#formModal1"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('destroy.category',$category->id)}}" method="POST" id="delete-form-{{ $category->id }}" style="display:inline;">
                            @method('delete')
                            @csrf
                        </form>
                        <button type="button" class="icon-button delete-button btn-delete-cascade" aria-label="Supprimer l'élément" data-id="{{ $category->id }}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                   
                @endforeach
                                 <!-- Modal1-->
        <div class="modal fade" id="formModal1" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="formModalLabel">Modifier la catégorie</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                <form action="{{route('update.category',$category->id)}}" method="POST" >
                    @csrf
                    @method('put')
                    <div class="mb-3">
                    <label for="type" class="form-label">Type :</label>
                    <select name="type" id="type" class="form-control">
                        <option value="{{ $category->type }}">{{ $category->type }}</option>
                        <option value="Dépense">Dépense</option>
                        <option value="Revenu">Revenu</option>
                    </select>
                    
                    </div>
                    <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $category->nom }}" required>
                    </div>
                    <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-orange w-100">Enregistrer</button>
                </form>
                </div>
            </div>
            </div>
            </div>

                
                           
            </tbody>
        </table>
        </div>
        </div>
  </div>
</div>
        @else
            <h2>Aucune catégorie</h2>
        @endif
    

 <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="formModalLabel">Nouvelle catégorie</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                <form action="{{route('store.category')}}" method="POST" >
                    @csrf
                    <div class="mb-3">
                    <label for="type" class="form-label">Type :</label>
                    <select name="type" id="type" class="form-control">
                        <option value=""></option>
                        <option value="Dépense">Dépense</option>
                        <option value="Revenu">Revenu</option>
                    </select>
                    
                    </div>
                    <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange w-100">Enregistrer</button>
                </form>
                </div>
            </div>
            </div>
            </div>


