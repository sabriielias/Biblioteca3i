<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::insert([
            ['nombre' => 'Ficción'],
            ['nombre' => 'Ciencia'],
            ['nombre' => 'Historia'],
        ]);
    }
}