@include('adminDashboard.style')
@php
    use App\Models\Operation;
    use App\Models\Category;

    $total_revenus = Operation::whereHas('category', fn($q) => $q->where('type', 'Revenu'))->sum('montant');
    $total_depenses = Operation::whereHas('category', fn($q) => $q->where('type', 'Dépense'))->sum('montant');
    $solde_actuel = $total_revenus - $total_depenses;
    $nombre_operations = Operation::count();
    $users=\App\Models\User::all();
    // Dernières opérations
    $dernieres_operations = Operation::with('user', 'category')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    // Données pour le graphe Pie (catégories)
    $categories = Category::withCount('operations')->get();
    $labels_categories = $categories->pluck('nom')->toArray();
    $data_categories = $categories->pluck('operations_count')->toArray();

    function generateDistinctColors($count) {
    $colors = [];
    for ($i = 0; $i < $count; $i++) {
        $hue = intval(($i * 360 / $count) % 360); // répartition uniforme sur 360°
        $colors[] = "hsl($hue, 70%, 50%)";       // saturation 70%, luminosité 50%
    }
    return $colors;
}
$colors_categories = generateDistinctColors($categories->count());

    // Données pour le graphe Line (revenus/dépenses par mois)
    $mois_labels = collect(range(1, 12))->map(fn($m) => date("F", mktime(0, 0, 0, $m, 1)));
    $revenus = [];
    $depenses = [];
    foreach (range(1, 12) as $m) {
        $revenus[] = Operation::whereMonth('created_at', $m)->whereHas('category', fn($q) => $q->where('type', 'Revenu'))->sum('montant');
        $depenses[] = Operation::whereMonth('created_at', $m)->whereHas('category', fn($q) => $q->where('type', 'Dépense'))->sum('montant');
    }
@endphp

<div class="container-fluid mt-4">

    {{-- ================== PARTIE 1 : KPI CARDS ================== --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Revenus</p>
                        <h4 class="my-1 text-info">{{ $total_revenus }} FCFA</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Dépenses</p>
                        <h4 class="my-1 text-danger">{{ $total_depenses }} FCFA</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Solde Actuel</p>
                        <h4 class="my-1 text-success">{{ $solde_actuel }} FCFA</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Nombre d'opérations</p>
                        <h4 class="my-1 text-warning">{{ $nombre_operations }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ================== PARTIE 2 : GRAPHIQUES ================== --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Répartition par Catégorie</h6>
                </div>
                <div class="card-body">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="row">
                <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Évolution Revenus vs Dépenses</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                 </div>
            </div>
        <div class="row">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Dernières Opérations</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped align-middle table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Utilisateur</th>
                                <th>Catégorie</th>
                                <th>Type</th>
                                <th>Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dernieres_operations as $op)
                                <tr>
                                    <td>{{ $op->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $op->user->email }}</td>
                                    <td>{{ $op->category->nom }}</td>
                                    <td>
                                        <span class="badge bg-{{ $op->category->type == 'Revenu' ? 'success' : 'danger' }}">
                                            {{ $op->category->type }}
                                        </span>
                                    </td>
                                    <td>{{ number_format($op->montant, 0, ',', ' ') }} FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                    
</div>
    
    
    {{-- ================== PARTIE 3 : TABLEAU ================== --}}
</div>
<!-- Card Table -->
<div class="card shadow-sm">
    <div class="card-header bg-light">
        <h6 class="mb-0">Dernières Opérations</h6>
    </div>
    <div class="card-body">
        <table id="usersTable" class="table table-striped align-middle table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Profession</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @if ($user->isAdmin) 
                        @continue
                    @endif
                    <tr>
                        <td>
                            <img src="{{ $user->imageUrl() }}" alt="{{ $user->nom }}" class="img-fluid rounded-circle" width="74">
                        </td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->profession }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->isBlocked) 
                                <span class="badge bg-danger">Bloqué</span>
                            @else
                                <span class="badge bg-success">Actif</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route($user->isBlocked ? 'users.unblock' : 'users.block', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $user->isBlocked ? 'btn-success' : 'btn-danger' }}" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir {{ $user->isBlocked ? 'débloquer' : 'bloquer' }} cet utilisateur ?')">
                                    {{ $user->isBlocked ? 'Débloquer' : 'Bloquer' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@include('message_erreur_sweet_alert')
@include('adminDashboard.script')