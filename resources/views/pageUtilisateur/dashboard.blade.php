<style>

.radius-10 {
    border-radius: 10px !important;
}

.border-info {
    border-left: 5px solid  #0dcaf0 !important;
}
.border-danger {
    border-left: 5px solid  #fd3550 !important;
}
.border-success {
    border-left: 5px solid  #15ca20 !important;
}
.border-warning {
    border-left: 5px solid  #ffc107 !important;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.card:hover {
    box-shadow: 0 4px 20px 0 rgb(218 218 253 / 65%), 0 4px 20px 0 rgb(206 206 238 / 54%);
    transition: all .3s ease-in-out;
    transform: translateY(-5px);
}
.bg-gradient-scooter {
    background: #17ead9;
    background: -webkit-linear-gradient( 
45deg
 , #17ead9, #6078ea)!important;
    background: linear-gradient( 
45deg
 , #17ead9, #6078ea)!important;
}
.widgets-icons-2 {
    width: 56px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ededed;
    font-size: 27px;
    border-radius: 10px;
}
.rounded-circle {
    border-radius: 50%!important;
}
.text-white {
    color: #fff!important;
}
.ms-auto {
    margin-left: auto!important;
}
.bg-gradient-bloody {
    background: #f54ea2;
    background: -webkit-linear-gradient( 
45deg
 , #f54ea2, #ff7676)!important;
    background: linear-gradient( 
45deg
 , #f54ea2, #ff7676)!important;
}

.bg-gradient-ohhappiness {
    background: #00b09b;
    background: -webkit-linear-gradient( 
45deg
 , #00b09b, #96c93d)!important;
    background: linear-gradient( 
45deg
 , #00b09b, #96c93d)!important;
}

.bg-gradient-blooker {
    background: #ffdf40;
    background: -webkit-linear-gradient( 
45deg
 , #ffdf40, #ff8359)!important;
    background: linear-gradient( 
45deg
 , #ffdf40, #ff8359)!important;
}
</style>
@php
    use App\Models\Operation;
    use App\Models\Categorie;
    $total_revenus = Operation::where('user_id', auth()->id())->whereHas('category', function($query) {$query->where('type', 'Revenu');})->sum('montant');
    $total_depenses = Operation::where('user_id', auth()->id())->whereHas('category', function($query) {$query->where('type', 'Dépense');})->sum('montant');
    $solde_actuel = $total_revenus - $total_depenses;
    $nombre_operations = Operation::where('user_id', auth()->id())->count();
@endphp
<div class="container-fluid" style="margin-top: 60px">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

        <!-- Total revenus -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total revenus</p>
                            <h4 class="my-1 text-info">{{ $total_revenus }} FCFA</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                            <i class='bx bx-wallet-alt'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total dépense -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total dépense</p>
                            <h4 class="my-1 text-danger">{{ $total_depenses }} FCFA</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                            <i class="fa fa-credit-card"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Solde actuel -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Solde actuel</p>
                            <h4 class="my-1 text-success">{{ $solde_actuel }} FCFA</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                            <i class="fa fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nombre d'opérations -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Nombre d'opérations</p>
                            <h4 class="my-1 text-warning">{{ $nombre_operations }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                            <i class="fa fa-tasks"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@php
use App\Models\Category;
use Illuminate\Support\Facades\DB;
// On récupère toutes les catégories avec le nombre d'opérations
$categories = Category::withCount(['operations' => function($query) {
    $query->where('user_id', auth()->id()); // ou $userId si tu le passes en paramètre
}])->get();

$labels = $categories->pluck('nom')->toArray();
$data = $categories->pluck('operations_count')->toArray();
// Fonction pour générer des couleurs aléatoires
function distinctColors($n) {
    $colors = [];
    for ($i = 0; $i < $n; $i++) {
        $hue = intval(360 * $i / $n); // Répartir les teintes
        $colors[] = "hsl($hue, 70%, 50%)"; // Saturation 70%, Luminosité 50%
    }
    return $colors;
}
// Générer des couleurs distinctes pour chaque catégorie
$colors = distinctColors(count($labels));
// Revenus par mois
$revenus = Operation::select(
        DB::raw('MONTH(created_at) as mois'),
        DB::raw('SUM(montant) as total')
    )
    ->where('user_id', auth()->id()) // ou $userId si tu veux passer un param
    ->whereHas('category', function($q){
        $q->where('type', 'Revenu');
    })
    ->groupBy('mois')
    ->pluck('total', 'mois');


// Dépenses par mois
$depenses = Operation::select(
        DB::raw('MONTH(created_at) as mois'),
        DB::raw('SUM(montant) as total')
    )
    ->where('user_id', auth()->id())
    ->whereHas('category', function($q){
        $q->where('type', 'Dépense');
    })
    ->groupBy('mois')
    ->pluck('total', 'mois');


// Labels = mois de l'année (1 à 12)
$labels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];

// Construire les datasets avec 0 si pas de données
$revenusData = [];
$depensesData = [];
for ($i = 1; $i <= 12; $i++) {
    $revenusData[] = $revenus[$i] ?? 0;
    $depensesData[] = $depenses[$i] ?? 0;
}

@endphp





<style>
.diagramme {
    position: relative;
    width: 80%;
    margin: auto;
}
.diagrammes{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<div class="row g-4 justify-content-center align-items-start">
    <!-- Doughnut / Pie Chart -->
    <div class="col-md-6 col-sm-12">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <canvas id="pieChart" style="max-width: 100%; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Chart -->
    <div class="col-md-6 col-sm-12">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <canvas id="lineChart" style="max-width: 100%; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



    <script>
        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Nombre d\'opérations',
                    data: @json($data),
                    backgroundColor: @json($colors),
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                cutout: '75%',
                responsive: true,
                plugins: {
                    legend: {
                        position: 'left',
                        labels: {
                            boxWidth: 20,
                            padding: 15,
                            font: {
                                size: 14
                            },
                            color: '#333'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Opérations par catégorie',
                        font: {
                            size: 18
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    transition: {
                        duration: 500
                    }
                }
            }
            
        });
    </script>

<script>
const ctx1 = document.getElementById('lineChart').getContext('2d');

new Chart(ctx1, {
    type: 'line',
    data: {
        labels: @json($labels),
        datasets: [
            {
                label: 'Revenus',
                data: @json($revenusData),
                borderColor: 'rgba(40, 167, 69, 1)',
                backgroundColor: 'rgba(40, 167, 69, 0.2)',
                fill: true,
                tension: 0.3
            },
            {
                label: 'Dépenses',
                data: @json($depensesData),
                borderColor: 'rgba(220, 53, 69, 1)',
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                fill: true,
                tension: 0.3
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
                font: {
                                size: 14
                            },
                            color: '#333'
            },
            title: {
                display: true,
                text: 'Évolution mensuelle des revenus et dépenses',
                font: {
                        size: 18
                    }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>