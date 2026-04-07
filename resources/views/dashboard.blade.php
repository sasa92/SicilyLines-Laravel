@extends('extend.template')
@section('title', 'Dashboard')
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

    <div class="db-container">
        <div class="db-action-header">
            <div>
    <a href="{{ route('ferries.pdf.all') }}" class="db-btn-pdf" style="text-decoration: none; display: inline-block;">
        Générer un pdf
    </a>
    <h1 style="font-style: italic; margin-top: 15px; font-weight: 800;">Gestion de la flotte</h1>
</div>
            <a href="{{ route('ferries.create') }}" class="db-btn-add">Ajouter un ferry</a>
        </div>

        <div class="db-glass-card">
            <table class="db-table">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>longueur</th>
                        <th>largeur</th>
                        <th>Vitesse</th>
                        <th style="text-align: center;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ferries as $ferry)
                    <tr>
                        <td>{{ $ferry->nom }}</td> 
                        <td>{{ $ferry->longueur }}m</td>
                        <td>{{ $ferry->largeur }}m</td> 
                        <td>{{ $ferry->vitesse }} noeuds</td> 
                        <td style="text-align: center;">
                            <a href="{{ route('ferries.show', $ferry->id) }}" class="db-btn-action db-btn-detail">Détail</a>
                            <button class="db-btn-action db-btn-modify">modifier</button>
                            <form action="{{ route('ferries.destroy', $ferry->id) }}" method="POST" style="display:inline;"> 
                                @csrf @method('DELETE')
                                <button type="submit" class="db-btn-action db-btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection