<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestión de Préstamos
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <!-- Formulario para registrar préstamo -->
        <form wire:submit.prevent="guardarPrestamo" class="bg-white shadow p-6 rounded mb-6">
            <h3 class="text-lg font-semibold mb-4">Registrar nuevo préstamo</h3>

            <div class="mb-4">
                <label class="block text-sm font-medium">Libro</label>
                <select wire:model="libro_id" class="w-full mt-1 border-gray-300 rounded">
                    <option value="">-- Seleccionar libro --</option>
                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                    @endforeach
                </select>
                @error('libro_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Usuario</label>
                <select wire:model="user_id" class="w-full mt-1 border-gray-300 rounded">
                    <option value="">-- Seleccionar usuario --</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
                @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Fecha de préstamo</label>
                <input wire:model="fecha_prestamo" type="date" class="w-full mt-1 border-gray-300 rounded">
                @error('fecha_prestamo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar préstamo
            </button>
        </form>

        <!-- Tabla de préstamos -->
        <div class="bg-white shadow p-6 rounded">
            <h3 class="text-lg font-semibold mb-4">Historial de préstamos</h3>

            @forelse($prestamos as $prestamo)
                <div class="border-b py-2 text-sm flex justify-between items-center">
                    <div>
                        📘 <strong>{{ $prestamo->libro->titulo }}</strong> prestado a
                        <strong>{{ $prestamo->usuario->name }}</strong>
                        el {{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}

                        @if($prestamo->devuelto)
                            – <span class="text-green-600 font-semibold">Devuelto</span>
                            el {{ \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') }}
                        @else
                            – <span class="text-yellow-600 font-semibold">En préstamo</span>
                        @endif
                    </div>

                    @if(!$prestamo->devuelto)
                        <button
                            wire:click="marcarDevuelto({{ $prestamo->id }})"
                            class="text-sm text-blue-600 hover:underline ml-4"
                        >
                            Marcar como devuelto
                        </button>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No hay préstamos registrados aún.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>