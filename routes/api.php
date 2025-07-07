<?php

use Illuminate\Support\Facades\Route;
use App\Models\Libro;

Route::get('/libros', function () {
    return Libro::with('categoria')->get();
});