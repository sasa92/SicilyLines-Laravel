@extends('extend.template')


@section('title', 'Ajouter un Ferry')

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

    <div class="form-wrapper">
        <div class="form-header">
            <h2 style="color: white; margin: 0;">Ajouter un nouveau ferry</h2>
            <a href="{{ route('ferries.index') }}" class="btn-back-gold">← Retour à la flotte</a>
        </div>

        <form action="{{ route('ferries.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            
            <div class="form-input-box">
                <label>Nom du ferry</label>
                <input type="text" name="nom" required placeholder="Ex: Pont-Aven">
            </div>

            <div class="form-input-grid">
                <div class="form-input-box">
                    <label>Longueur (m)</label>
                    <input type="number" step="0.01" name="longueur" required>
                </div>
                <div class="form-input-box">
                    <label>Largeur (m)</label>
                    <input type="number" step="0.01" name="largeur" required>
                </div>
                <div class="form-input-box">
                    <label>Vitesse (nœuds)</label>
                    <input type="number" name="vitesse" required>
                </div>
            </div>

            <div class="form-input-box">
                <label>Photo du navire</label>
                <input type="file" name="photo" accept="image/*" style="color: #888;">
            </div>

            <div class="form-input-box">
                <label><strong>Équipements disponibles :</strong></label>
                <div class="form-checkbox-group">
                    @foreach($equipements as $equipement)
                        <label class="form-checkbox-item">
                            <input type="checkbox" name="equipements[]" value="{{ $equipement->id }}">
                            {{ $equipement->libelle }}
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn-login-gold">Enregistrer le Ferry</button>
        </form>
    </div>
</div>
@endsection