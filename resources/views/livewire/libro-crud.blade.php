<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $modo_edicion ? 'Editar libro' : 'Gestión de Libros' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">

        <!-- Formulario para crear o editar libro -->
        <form wire:submit.prevent="{{ $modo_edicion ? 'actualizarLibro' : 'guardarLibro' }}" class="bg-white shadow p-6 rounded mb-6">
            <div class="mb-4">
                <label class="block text-sm font-medium">Título</label>
                <input wire:model="titulo" type="text" class="w-full mt-1 border-gray-300 rounded" />
                @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Autor</label>
                <input wire:model="autor" type="text" class="w-full mt-1 border-gray-300 rounded" />
                @error('autor') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Categoría</label>
                <select wire:model="categoria_id" class="w-full mt-1 border-gray-300 rounded">
                    <option value="">-- Seleccionar --</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    {{ $modo_edicion ? 'Actualizar Libro' : 'Guardar Libro' }}
                </button>

                @if($modo_edicion)
                    <button type="button" wire:click="cancelarEdicion" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Cancelar
                    </button>
                @endif
            </div>
        </form>

        <!-- Listado de libros -->
        <div class="bg-white shadow p-6 rounded">
            <h3 class="text-lg font-semibold mb-4">Listado de Libros</h3>

            @forelse($libros as $libro)
                <div class="border-b py-2 flex justify-between items-center">
                    <div>
                        📘 <strong>{{ $libro->titulo }}</strong> por {{ $libro->autor }}
                        <span class="text-sm text-gray-500">[{{ $libro->categoria->nombre ?? 'Sin categoría' }}]</span>
                    </div>
                    <div class="flex gap-4">
                        <button wire:click="editarLibro({{ $libro->id }})" class="text-blue-600 hover:underline text-sm">
                            Editar
                        </button>

                        <button
                            onclick="confirm('¿Estás seguro que querés eliminar este libro?') || event.stopImmediatePropagation()"
                            wire:click="eliminarLibro({{ $libro->id }})"
                            class="text-red-600 hover:underline text-sm"
                        >
                            Eliminar
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No hay libros cargados aún.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>