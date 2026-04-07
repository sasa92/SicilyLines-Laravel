<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
{
    Auth::logout(); // Déconnecte l'utilisateur

    $request->session()->invalidate(); // Détruit la session
    $request->session()->regenerateToken(); // Recrée un jeton CSRF tout neuf par sécurité

    return redirect('/login'); // Redirige vers la page de connexion
}

}