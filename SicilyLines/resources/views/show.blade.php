@extends('extend.template')
@section('title', 'Détail du Ferry')

@section('contenu')
<div class="db-page-wrapper">
    <nav class="db-nav">
        <div class="nav-brand">
            <img src="{{ asset('images/logo.png') }}" class="nav-logo" alt="Logo">
            <span class="nav-text">SicilyLines</span>
        </div>
        <div class="db-user-section">
            <div class="db-user-avatar"></div>
            <div class="db-user-info">
                <span class="db-user-name">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="db-btn-logout">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="detail-container">
        <div class="form-header">
            <h1 style="color: white; margin: 0;">Fiche détaillée : {{ $ferry->nom }}</h1>
            <a href="{{ route('ferries.index') }}" class="btn-back-gold">← Retour à la flotte</a>
        </div>

        <div class="detail-grid">
            <div class="detail-left">
                <div class="detail-card">
                    <h3 class="detail-title">Caractéristiques Techniques</h3>
                    <ul class="detail-list">
                        <li><strong>Nom :</strong> {{ $ferry->nom }}</li>
                        <li><strong>Longueur :</strong> {{ $ferry->longueur }} m</li>
                        <li><strong>Largeur :</strong> {{ $ferry->largeur }} m</li>
                        <li><strong>Vitesse :</strong> {{ $ferry->vitesse }} nœuds</li>
                    </ul>
                </div>

                <div class="detail-card">
                    <h3 class="detail-title">Visuel du navire</h3>
                    @if($ferry->photo)
                        <img src="{{ asset('images/ferries/' . $ferry->photo) }}" alt="{{ $ferry->nom }}" class="detail-photo">
                    @else
                        <div class="detail-no-photo">
                            <p>Aucune image disponible</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="detail-card">
                <h3 class="detail-title">Équipements à bord</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 15px;">
                    @forelse($ferry->equipements as $equipement)
                        <span class="detail-badge">✔ {{ $equipement->libelle }}</span>
                    @empty
                        <p style="color: #888; font-style: italic;">Aucun équipement enregistré.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection