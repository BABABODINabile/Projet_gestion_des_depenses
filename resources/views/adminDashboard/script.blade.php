<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Exemple Pie Chart
   new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        labels: @json($labels_categories),
        datasets: [{
            data: @json($data_categories),
            backgroundColor: @json($colors_categories),
        }]
    },
    options: {
        cutout: '75%',
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'left',
                labels: {
                    usePointStyle: true,  // transforme les carrés en cercles
                    pointStyle: 'circle',
                     padding: 20,
                    color: '#000',
                    font: { size: 14 },
                    // Cercle creux pour les légendes
                    generateLabels: (chart) => {
                        const data = chart.data;
                        return data.labels.map((label, i) => ({
                            text: label,
                            fillStyle: 'transparent',               // cercle creux
                            strokeStyle: data.datasets[0].backgroundColor[i], // contour
                            lineWidth: 4,
                            hidden: false,
                            index: i
                        }));
                    }
                }
            }
        }
    }
});


    // Exemple Line Chart
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: @json($mois_labels),
            datasets: [
                { label: 'Revenus', data: @json($revenus), borderColor: 'green', fill: false },
                { label: 'Dépenses', data: @json($depenses), borderColor: 'red', fill: false }
            ]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } },
    });
</script>

<!-- Scripts Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "search": "Recherche:",
            "lengthMenu": "Afficher _MENU_ entrées",
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent"
            }
        }
    });
});
</script>