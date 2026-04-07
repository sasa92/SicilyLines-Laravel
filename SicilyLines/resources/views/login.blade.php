@extends('extend.template')

@section('title', 'Se connecter')

@section('contenu')
<div class="login-page">
    <div class="login-nav">
        <div class="nav-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="nav-logo">
            <span class="nav-text">SicilyLines</span>
        </div>
        <a href="{{ url('/') }}" class="btn-retour">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    <div class="login-content">
        <div class="login-glass-card">
            <div class="login-header">
                <h2>Connexion</h2>
                <p>Accédez à votre espace SicilyLines</p>
            </div>

            
            @if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-box">
                    <label>Adresse Email</label>
                    <input type="email" name="email" placeholder="nom@exemple.com" required>
                </div>

                <div class="input-box">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-login-gold">Se connecter</button>
            </form>

            <div class="login-footer">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>
</div>
@endsection