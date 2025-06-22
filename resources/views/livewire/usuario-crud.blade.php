<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Gestión de Usuarios
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">

        <!-- Formulario -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">
                {{ $modoEdicion ? 'Editar usuario' : 'Nuevo usuario' }}
            </h3>

            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <input wire:model="name" type="text" placeholder="Nombre"
                    class="w-full mb-2 px-3 py-2 border rounded @error('name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <input wire:model="email" type="email" placeholder="Correo electrónico"
                    class="w-full mb-2 px-3 py-2 border rounded @error('email') border-red-500 @enderror">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <div class="flex gap-2 mt-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        {{ $modoEdicion ? 'Actualizar' : 'Guardar' }}
                    </button>
                    @if($modoEdicion)
                        <button type="button" wire:click="cancelar" class="text-gray-600 underline">
                            Cancelar
                        </button>
                    @endif
                </div>
            </form>
        </div>

        <!-- Lista de usuarios -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Usuarios registrados</h3>

            @forelse($usuarios as $usuario)
                <div class="flex justify-between items-center border-b py-2">
                    <div>
                        <strong>{{ $usuario->name }}</strong>
                        <p class="text-sm text-gray-500">{{ $usuario->email }}</p>
                    </div>
                    <div class="flex gap-3 text-sm">
                        <button wire:click="editar({{ $usuario->id }})" class="text-blue-600 hover:underline flex items-center gap-1">
                            ✏️ <span>Editar</span>
                        </button>
                        <button wire:click="eliminar({{ $usuario->id }})" class="text-red-600 hover:underline flex items-center gap-1">
                            🗑️ <span>Eliminar</span>
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No hay usuarios registrados.</p>
            @endforelse

            <p class="text-sm text-gray-500 mt-4">
                Total de usuarios: {{ count($usuarios) }}
            </p>
        </div>
    </div>
</x-app-layout>