<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestión de Libros
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <livewire:libro-crud />
    </div>
</x-app-layout>