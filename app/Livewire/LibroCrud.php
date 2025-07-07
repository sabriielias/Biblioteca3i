<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;
use App\Models\Categoria;

class LibroCrud extends Component
{
    public $titulo, $autor, $categoria_id;
    public $libros = [];
    public $categorias = [];

    public $libro_id;
    public $modo_edicion = false;

    public function mount()
    {
        $this->libros = Libro::with('categoria')->get();
        $this->categorias = Categoria::all();
    }

    public function guardarLibro()
    {
        $this->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Libro::create([
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'categoria_id' => $this->categoria_id,
        ]);

        session()->flash('mensaje', '📘 Libro guardado correctamente.');

        $this->reset(['titulo', 'autor', 'categoria_id']);
        $this->libros = Libro::with('categoria')->get();
    }

    public function editarLibro($id)
    {
        $libro = Libro::findOrFail($id);

        $this->libro_id = $libro->id;
        $this->titulo = $libro->titulo;
        $this->autor = $libro->autor;
        $this->categoria_id = $libro->categoria_id;
        $this->modo_edicion = true;
    }

    public function actualizarLibro()
    {
        $this->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $libro = Libro::findOrFail($this->libro_id);
        $libro->update([
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'categoria_id' => $this->categoria_id,
        ]);

        session()->flash('mensaje', '📘 Libro actualizado correctamente.');

        $this->reset(['titulo', 'autor', 'categoria_id', 'libro_id', 'modo_edicion']);
        $this->libros = Libro::with('categoria')->get();
    }

    public function cancelarEdicion()
    {
        $this->reset(['titulo', 'autor', 'categoria_id', 'libro_id', 'modo_edicion']);
    }

    public function eliminarLibro($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        session()->flash('mensaje', '🗑️ Libro eliminado correctamente.');

        $this->libros = Libro::with('categoria')->get();
    }

    public function render()
    {
        return view('livewire.libro-crud');
    }
}