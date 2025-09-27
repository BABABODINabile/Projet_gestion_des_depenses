<!-- ✅ Styles Bootstrap et DataTables -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet">

<style>

    /* Couleur personnalisée #FF4B2B */
    .btn-ff4b2b {
        background-color: #00ff55;
        color: #fff;
        border: none;
        border-radius: 6px;
    }
    .btn-ff4b2b:hover {
        background-color: #000;
        color: #FF4B2B;
    }

    /* Table header/footer */
    #operation thead th, 
    #operation tfoot th {
        background: #000000;
        color: #fff;
        border-bottom: 2px solid #FF4B2B;
    }

    /* Ligne sélectionnée */
    #operation tbody tr.selected {
        background: #FF4B2B !important;
        color: #fff;
    }

    /* Pagination */
    .dataTables_paginate .paginate_button {
        background: #fff;
        color: #FF4B2B !important;
        border: 1px solid #FF4B2B;
        border-radius: 6px;
        margin: 0 2px;

    }
    .dataTables_paginate .paginate_button.current, 
    .dataTables_paginate .paginate_button:hover {
        background: #FF4B2B !important;
        color: #fff !important;
    }

    /* Barre de recherche */
    .dataTables_filter input {
        border: 1px solid #FF4B2B;
        border-radius: 6px;
        padding: 4px 10px;
        font-family: inherit;
    }

    /* Opérations Header */
    .operation-header {
        margin-top: 40px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .operation-header h2 {
        color: #FF4B2B;
        font-weight: 800;
        font-size: 2.3rem;
        letter-spacing: 1px;
        text-shadow: 1px 1px 8px #00000022;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .operation-header h2 .fa {
        color: #000;
        font-size: 2.1rem;
    }
    .dataTables_wrapper .dataTables_paginate {
    display: flex !important;
    justify-content: flex-end !important;
}

    /* Bouton Ajouter une opération */
    .btn-ajout-operation {
        background: #FF4B2B;
        color: #fff;
        font-weight: 700;
        border-radius: 10px;
        padding: 10px 28px;
        font-size: 1.1em;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%);
        border: none;
        transition: background 0.2s;
    }
    .btn-ajout-operation:hover, .btn-ajout-operation:focus {
        background: #000 !important;
        color: #FF4B2B !important;
    }
    @media (max-width: 600px) {
        .btn-ajout-operation {
            width: 100%;
            margin-bottom: 10px;
        }
        .d-flex.justify-content-end.align-items-center.mb-3 {
            justify-content: center !important;
        }
    }

</style>
<div class="operation-header">
    <h2>
        <span class="fa fa-exchange-alt"></span>
        Opérations
    </h2>
</div>
@if ($user->categories->isNotEmpty())
    <div class="d-flex justify-content-end align-items-center mb-3" style="margin-top: 32px;">
    <button type="button" class="btn btn-ajout-operation" data-bs-toggle="modal" data-bs-target="#formModalO">
        <span class="fa fa-plus me-2" style="color:#fff;"></span>Ajouter une opération
    </button>
</div>
@endif

<!-- Modal -->
        <div class="modal fade" id="formModalO" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="formModalLabel">Nouvelle catégorie</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                <form action="{{route('store.operation')}}" method="POST" >
                    @csrf
                    <div class="mb-3">
                    <label for="category" class="form-label">Catégorie: </label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($user->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nom }}</option>
                        @endforeach
                    </select>

                    </div>
                    <div class="mb-3">
                    <label for="montant" class="form-label">Montant: </label>
                    <input type="text" class="form-control" id="montant" name="montant" required>
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



<div class="table-responsive">
    <table id="operation" class="table table-striped w-100 " style="margin-top: 10px">
    <thead>
        <tr>
            <th>Catégorie de l'opération</th>
            <th>Description</th>
            <th>Montant</th>
            <th>Date & heure</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->operations as $operation)
            <tr>
            <td>{{ $operation->category->nom ?? 'N/A' }}</td>
            <td>{{ $operation->description }}</td>
            <td>{{ $operation->montant }}</td>
            <td>{{ $operation->updated_at->format('d/m/Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
    
</table>
</div>


<!-- ✅ Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>

<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

<script>
$(document).ready(function() {
    $('#operation').DataTable({
        responsive: true,
        language: {
            decimal: ",",
            thousands: " ",
            search: "Rechercher :",
            lengthMenu: "Afficher _MENU_ enregistrements",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            infoEmpty: "Aucune donnée disponible",
            emptyTable: "Aucune donnée disponible dans le tableau",
            infoFiltered: "(filtré sur _MAX_ au total)",
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent"
            }
        },
       dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copier',
                className: 'btn btn-secondary'
            },
            {
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                className: 'btn btn-info'
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: 'Imprimer',
                className: 'btn btn-primary'
            },
            {
                extend: 'colvis',
                text: 'Colonnes',
                className: 'btn btn-dark'
            }
        ]
    });
});

</script>
