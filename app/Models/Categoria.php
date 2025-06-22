<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación: una categoría tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}