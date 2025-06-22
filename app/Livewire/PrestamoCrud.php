<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Support\Carbon;

class PrestamoCrud extends Component
{
    public $libro_id, $user_id, $fecha_prestamo;
    public $prestamos = [];
    public $libros = [];
    public $usuarios = [];

    public function mount()
    {
        $this->prestamos = Prestamo::with(['libro', 'usuario'])->get();
        $this->libros = Libro::all();
        $this->usuarios = User::all();
        $this->fecha_prestamo = Carbon::now()->toDateString();
    }

    public function guardarPrestamo()
    {
        $this->validate([
            'libro_id' => 'required|exists:libros,id',
            'user_id' => 'required|exists:users,id',
            'fecha_prestamo' => 'required|date',
        ]);

        Prestamo::create([
            'libro_id' => $this->libro_id,
            'user_id' => $this->user_id,
            'fecha_prestamo' => $this->fecha_prestamo,
            'devuelto' => false,
        ]);

        $this->reset(['libro_id', 'user_id']);
        $this->prestamos = Prestamo::with(['libro', 'usuario'])->get();
    }

    public function marcarDevuelto($id)
    {
        $prestamo = Prestamo::findOrFail($id);

        $prestamo->update([
            'devuelto' => true,
            'fecha_devolucion' => Carbon::now(),
        ]);

        $this->prestamos = Prestamo::with(['libro', 'usuario'])->get();
    }

    public function render()
    {
        return view('livewire.prestamo-crud');
    }
}