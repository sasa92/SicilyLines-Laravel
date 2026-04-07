<nav class="navbar navbar-expand-lg navbar-dark fixed-top main-navbar">
    <div class="container-fluid">
        
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="nav-logo me-2">
            <span class="fw-bold text-white nav-text">SicilyLines</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" style="z-index: 10001;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#apropos">À propos</a></li>
                <li class="nav-item"><a class="nav-link" href="#service">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>

            <div class="text-center d-flex justify-content-center ms-lg-3">
                <a href="{{ route('login') }}" class="btn btn-warning px-4 py-2 rounded-pill fw-bold text-dark">connexion</a>
            </div>
        </div>
    </div>
</nav>