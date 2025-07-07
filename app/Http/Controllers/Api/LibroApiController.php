<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroApiController extends Controller
{
    public function index()
    {
        return Libro::all();
    }

    public function show($id)
    {
        return Libro::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        return Libro::create($validated);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return $libro;
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json(['mensaje' => 'Libro eliminado correctamente']);
    }
}