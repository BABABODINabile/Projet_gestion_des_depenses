<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Layout</title>
    <!-- Boxicons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('pageUtilisateur.style')
    <style>
        .main-section { display: none; padding: 2rem; }
        .main-section.active { display: block; }
    </style>
</head>
<body class="body-pd" id="body-pd">

    <!-- Header -->
    <header class="header body-pd" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div style="display: flex; align-items: center; gap: 12px;">
            <div style="display: flex; flex-direction: column; justify-content: center;">
                {{ $user->nom }} {{ $user->prenom }} <br> {{ $user->email }}
            </div>
            @if(Auth::check())
                <span class="badge bg-success ms-2" style="height: auto; display: flex; align-items: center;">Connecté</span>
            @endif
        </div>
    </header>

    <!-- Sidebar -->
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_link" data-target="profil">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Profil</span>
                </a>
                <a href="#" class="nav_link" data-target="categorie">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Catégories</span>
                </a>
                <a href="#" class="nav_link" data-target="operations">
                    <i class='bx bx-transfer nav_icon'></i>
                    <span class="nav_name">Opérations</span>
                </a>
                <a href="#" class="nav_link btn-logout">
    <i class='bx bx-log-out nav_icon'></i>
    <span class="nav_name">Se déconnecter</span>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>


            </div>
        </nav>
    </div>

    <!-- Container Main -->
    <div class="height-100 bg-light">

        <!-- Sections principales -->
        <div id="profil" class="main-section">
            @include('pageUtilisateur.profil')
        </div>

        <div id="categorie" class="main-section">
            @include('pageUtilisateur.categorie')
        </div>

        <div id="operations" class="main-section">
            @include('pageUtilisateur.operation')
        </div>

    </div>

    @include('pageUtilisateur.script')
    @include('message_erreur_sweet_alert')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.nav_link[data-target]');
    const sections = document.querySelectorAll('.main-section');

    // Lire l'onglet actif depuis Laravel
    const activeTab = "{{ session('active_tab', 'profil') }}"; // 'profil' par défaut

    // Activer le lien et la section correspondante
    links.forEach(l => l.classList.remove('active'));
    const activeLink = document.querySelector(`.nav_link[data-target="${activeTab}"]`);
    if (activeLink) activeLink.classList.add('active');

    sections.forEach(s => s.classList.remove('active'));
    const activeSection = document.getElementById(activeTab);
    if (activeSection) activeSection.classList.add('active');

    // Gestion du clic sur les onglets
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            links.forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            sections.forEach(sec => sec.classList.remove('active'));
            const target = this.dataset.target;
            const targetSection = document.getElementById(target);
            if (targetSection) targetSection.classList.add('active');
        });
    });
});
</script>


</body>
</html>
