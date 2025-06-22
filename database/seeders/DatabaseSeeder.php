<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario fijo
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Crear más usuarios
        $usuarios = User::factory(4)->create();
        $usuarios->push($user); // Agregamos el fijo al array

        // Crear categorías
        $cat1 = Categoria::create(['nombre' => 'Ficción']);
        $cat2 = Categoria::create(['nombre' => 'Ciencia']);
        $cat3 = Categoria::create(['nombre' => 'Historia']);

        // Crear libros
        $libro1 = Libro::create([
            'titulo' => 'El Principito',
            'autor' => 'Antoine de Saint-Exupéry',
            'categoria_id' => $cat1->id,
        ]);

        $libro2 = Libro::create([
            'titulo' => 'Breve historia del tiempo',
            'autor' => 'Stephen Hawking',
            'categoria_id' => $cat2->id,
        ]);

        $libro3 = Libro::create([
            'titulo' => 'Sapiens',
            'autor' => 'Yuval Noah Harari',
            'categoria_id' => $cat3->id,
        ]);

        // Crear más préstamos con fechas y estados mixtos
        foreach (range(1, 10) as $i) {
            $usuario = $usuarios->random();
            $libro = [$libro1, $libro2, $libro3][array_rand([0, 1, 2])];
            $fechaPrestamo = Carbon::now()->subDays(rand(1, 15));

            // Aleatoriamente decidir si fue devuelto
            $devuelto = rand(0, 1) === 1;
            $fechaDevolucion = $devuelto ? $fechaPrestamo->copy()->addDays(rand(1, 5)) : null;

            Prestamo::create([
                'user_id' => $usuario->id,
                'libro_id' => $libro->id,
                'fecha_prestamo' => $fechaPrestamo,
                'fecha_devolucion' => $fechaDevolucion,
                'devuelto' => $devuelto,
            ]);
        }
    }
}