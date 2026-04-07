<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\FerryController;

// 1. Page d'accueil (Carousel)
Route::get('/', function () {
    return view('index');
});



// 2. Authentification (Login / Logout)
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// 3. LE DASHBOARD 
// On demande au FerryController d'exécuter la fonction index()
Route::get('/dashboard', [FerryController::class, 'index'])->middleware('auth')->name('dashboard');

// 4. Gestion de la flotte (Create, Store, Show, Edit, Update, Destroy)
Route::resource('ferries', FerryController::class)->middleware('auth');


// Route pour générer le PDF des détails d'un ferry
Route::get('/ferries/export/pdf', [FerryController::class, 'generateAllPDF'])->name('ferries.pdf.all');