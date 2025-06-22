<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UsuarioCrud extends Component
{
    public $usuarios;
    public $name, $email, $user_id;
    public $modoEdicion = false;

    public function mount()
    {
        $this->usuarios = User::orderBy('name')->get();
    }

    public function guardar()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('12345678'),
        ]);

        $this->reset(['name', 'email']);
        $this->usuarios = User::orderBy('name')->get();
    }

    public function editar($id)
    {
        $usuario = User::findOrFail($id);
        $this->user_id = $usuario->id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
        ]);

        User::findOrFail($this->user_id)->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->reset(['user_id', 'name', 'email', 'modoEdicion']);
        $this->usuarios = User::orderBy('name')->get();
    }

    public function eliminar($id)
    {
        User::destroy($id);
        $this->usuarios = User::orderBy('name')->get();
    }

    public function cancelar()
    {
        $this->reset(['user_id', 'name', 'email', 'modoEdicion']);
    }

    public function render()
    {
        return view('livewire.usuario-crud');
    }
}