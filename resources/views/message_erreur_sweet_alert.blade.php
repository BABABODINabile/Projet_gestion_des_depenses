<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            // Afficher un toast si une session "success" existe
            @if (session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            @endif
            // Message d'erreur
            @if (session('error'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            @endif
            document.addEventListener("DOMContentLoaded", function () {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    let userId = this.getAttribute('data-id');

                    Swal.fire({
                        title: "Êtes-vous sûr ?",
                        text: "Cette action est irréversible !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Oui, supprimer !",
                        cancelButtonText: "Annuler"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + userId).submit();
                        }
                    });
                });
            });})
            

                    // ✅ Gestion du bouton logout
            const logoutButton = document.querySelector('.btn-logout');
            if (logoutButton) {
                
                logoutButton.addEventListener('click', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: "Voulez-vous vous déconnecter ?",
                        text: "Vous allez être redirigé vers la page de connexion.",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Oui, déconnecter",
                        cancelButtonText: "Annuler"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                    });
                });
            }

            document.addEventListener("DOMContentLoaded", function () {
            const deleteButtons = document.querySelectorAll('.btn-delete-cascade');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    let userId = this.getAttribute('data-id');

                    Swal.fire({
                        title: "Êtes-vous sûr ?",
                        text: "Cette action est irréversible et supprimera toutes opérations liées à cette catégorie !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Oui, supprimer !",
                        cancelButtonText: "Annuler"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + userId).submit();
                        }
                    });
                });
            });})
            document.addEventListener("DOMContentLoaded", function () {
            const deleteButtons = document.querySelectorAll('.btn-update');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    let userId = this.getAttribute('data-id');

                    Swal.fire({
                        title: "Enregistrer les modifications !",
                        text: "Cette action est irréversible !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Oui, Enregistrer !",
                        cancelButtonText: "Annuler"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('update-form-' + userId).submit();
                        }
                    });
                });
            });})
        
    </script>