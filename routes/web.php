<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdatbazisController; 
use App\Http\Controllers\HozzavaloController;
use App\Http\Controllers\DiagramController; // DIAGRAM CONTROLLER IMPORTÁLÁSA
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// A dashboard (főoldal) csak bejelentkezés után érhető el
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Minden, ami bejelentkezéshez kötött
Route::middleware('auth')->group(function () {
    // Profil útvonalak (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Adatbázis Menü Útvonalai
    Route::get('/adatbazis', [AdatbazisController::class, 'index'])->name('adatbazis.index');
    Route::get('/adatbazis/kategoria/{kategoria}', [AdatbazisController::class, 'showKategoria'])->name('adatbazis.kategoria');
    Route::get('/adatbazis/etel/{etel}', [AdatbazisController::class, 'showEtel'])->name('adatbazis.etel');

    // DIAGRAM MENÜ ÚTVONALA (Garantáltan Helyes Útvonal Definíció)
    Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram.index');

    // CRUD Menü Útvonalai
    Route::resource('hozzavalo', HozzavaloController::class); 
});

require __DIR__.'/auth.php';