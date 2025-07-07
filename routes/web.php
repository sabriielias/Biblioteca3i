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

// Página de bienvenida
Route::view('/', 'welcome');

// Dashboard (solo si el usuario está autenticado y verificado)
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Vista de perfil (de usuario autenticado)
Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Vista del perfil del equipo desarrollador (¡pública!)
Route::view('/perfil-dev', 'profile-dev')
    ->name('perfil.dev');

// CRUD de Libros
Route::get('/libros', LibroCrud::class)
    ->middleware(['auth'])
    ->name('libros');

// CRUD de Préstamos
Route::get('/prestamos', PrestamoCrud::class)
    ->middleware(['auth'])
    ->name('prestamos');

// CRUD de Categorías
Route::get('/categorias', CategoriaCrud::class)
    ->middleware(['auth'])
    ->name('categorias');

// CRUD de Usuarios
Route::get('/usuarios', UsuarioCrud::class)
    ->middleware(['auth'])
    ->name('usuarios');


// Rutas de autenticación (login, register, etc.)
require __DIR__.'/auth.php';

// Ruta principal del sistema (con enlace visual a todo)
Route::view('/biblioteca3i', 'biblioteca')
    ->middleware(['auth'])
    ->name('home');

// Fallback para rutas no definidas
Route::fallback(function () {
    return redirect('/dashboard');
});

 
 

