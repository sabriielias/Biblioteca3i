<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $modo_edicion ? 'Editar libro' : 'Gestión de Libros' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
       
        <script>
            document.addEventListener('livewire:load', () => {
                console.log('✅ Livewire cargado correctamente.');
            });
        </script>

        <!-- Mensaje de éxito -->
        @if (session()->has('mensaje'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
                {{ session('mensaje') }}
            </div>
        @endif

        <!-- Formulario -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">{{ $modo_edicion ? 'Editar libro' : 'Nuevo libro' }}</h3>
            <form wire:submit.prevent="{{ $modo_edicion ? 'actualizarLibro' : 'guardarLibro' }}">
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
        </div>

        <!-- Listado de libros compacto -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Listado de Libros</h3>

            @forelse($libros as $libro)
                <div class="flex justify-between items-center border-b py-2">
                    <div class="flex items-center">
                        <span class="mr-3">📘</span>
                        <span class="font-medium">{{ $libro->titulo }}</span>
                        <span class="text-gray-600 text-sm ml-2">por {{ $libro->autor }}</span>
                        <span class="text-gray-500 text-xs ml-2">[{{ $libro->categoria->nombre ?? 'Sin categoría' }}]</span>
                    </div>
                    <div class="flex gap-4">
                        <button wire:click="editarLibro({{ $libro->id }})" 
                                class="text-orange-500 hover:text-orange-700 text-sm font-medium">
                            🖊️ Editar
                        </button>
                        <button onclick="confirm('¿Estás segura que querés eliminar este libro?') || event.stopImmediatePropagation()"
                                wire:click="eliminarLibro({{ $libro->id }})"
                                class="text-red-500 hover:text-red-700 text-sm font-medium">
                            🗑️ Eliminar
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 py-4">No hay libros cargados aún.</p>
            @endforelse
        </div>

        <!-- Botón para volver a Biblioteca 3i -->
        <div class="mt-6">
            <a href="/biblioteca3i" class="inline-block px-5 py-3 bg-purple-600 text-white rounded-lg text-sm font-semibold hover:bg-purple-700 transition">
                ← Volver a Biblioteca 3i
            </a>
        </div>
    </div>
</div>