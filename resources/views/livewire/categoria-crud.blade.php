<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Gestión de Categorías
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">

        <!-- Formulario -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">
                {{ $modoEdicion ? 'Editar categoría' : 'Nueva categoría' }}
            </h3>

            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <input
                    type="text"
                    wire:model="nombre"
                    placeholder="Nombre de la categoría"
                    class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror"
                />
                @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <div class="flex gap-2 mt-4">
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

        <!-- Listado de categorías -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Listado de categorías</h3>

            @forelse($categorias as $categoria)
                <div class="flex justify-between items-center border-b py-2">
                    <span>{{ $categoria->nombre }}</span>
                    <div class="flex gap-4 text-sm">
                        <button
                            wire:click="editar({{ $categoria->id }})"
                            class="text-blue-600 hover:underline flex items-center gap-1"
                        >
                            ✏️ <span>Editar</span>
                        </button>
                        <button
                            wire:click="eliminar({{ $categoria->id }})"
                            class="text-red-600 hover:underline flex items-center gap-1"
                        >
                            🗑️ <span>Eliminar</span>
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No hay categorías registradas.</p>
            @endforelse

            <p class="mt-4 text-sm text-gray-500">
                Total de categorías: {{ count($categorias) }}
            </p>
        </div>

        <!-- Botón para volver a Biblioteca 3i -->
        <div class="mt-6">
            <a href="/biblioteca3i" class="inline-block px-5 py-3 bg-purple-600 text-white rounded-lg text-sm font-semibold hover:bg-purple-700 transition">
                ← Volver a Biblioteca 3i
            </a>
        </div>
    </div>
</div>