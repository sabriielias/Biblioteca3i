<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class CategoriaCrud extends Component
{
    public $nombre, $categoria_id, $modoEdicion = false;
    public $categorias;

    public function mount()
    {
        $this->actualizarLista();
    }

    public function actualizarLista()
    {
        $this->categorias = Categoria::orderBy('nombre')->get();
    }

    public function guardar()
    {
        $this->validate(['nombre' => 'required|string|min:3']);

        Categoria::create(['nombre' => $this->nombre]);

        $this->reset(['nombre']);
        $this->actualizarLista();
    }

    public function editar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate(['nombre' => 'required|string|min:3']);

        Categoria::findOrFail($this->categoria_id)
            ->update(['nombre' => $this->nombre]);

        $this->reset(['nombre', 'modoEdicion', 'categoria_id']);
        $this->actualizarLista();
    }

    public function eliminar($id)
    {
        Categoria::destroy($id);
        $this->actualizarLista();
    }

    public function cancelar()
    {
        $this->reset(['nombre', 'modoEdicion', 'categoria_id']);
    }

    public function render()
    {
        return view('livewire.categoria-crud');
    }
}