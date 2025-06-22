<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\LibroCrud;
use App\Livewire\PrestamoCrud;
use App\Livewire\CategoriaCrud;
use App\Livewire\UsuarioCrud;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');

// Dashboard (accesible solo si el usuario está verificado)
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Perfil del usuario
Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Gestión de Libros
Route::get('/libros', LibroCrud::class)
    ->middleware(['auth'])
    ->name('libros');

// Gestión de Préstamos
Route::get('/prestamos', PrestamoCrud::class)
    ->middleware(['auth'])
    ->name('prestamos');

// Gestión de Categorías
Route::get('/categorias', CategoriaCrud::class)
    ->middleware(['auth'])
    ->name('categorias');

// Gestión de Usuarios
Route::get('/usuarios', UsuarioCrud::class)
    ->middleware(['auth'])
    ->name('usuarios');

// Rutas de autenticación (login, register, etc.)
require __DIR__.'/auth.php';

// Fallback para rutas no existentes (opcional pero recomendado)
Route::fallback(function () {
    return redirect('/dashboard');
});