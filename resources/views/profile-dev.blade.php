<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Perfil del Desarrollador
        </h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow text-center">
            <!-- Imagen personalizada -->
            <img src="{{ asset('images/captura.png') }}" alt="Foto de perfil"
                 class="mx-auto rounded-full mb-4 shadow w-32 h-32 object-cover">

            <!-- Nombre -->
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">
                Patricia Alejandra Viera
            </h3>

            <!-- Descripción breve -->
            <p class="text-sm text-gray-500 dark:text-gray-300 mb-4">
                Estudiante • Programación III
            </p>

            <!-- Biografía -->
            <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
                Soy estudiante de desarrollo web y me apasiona crear soluciones funcionales y organizadas. Durante este proyecto aprendí a aplicar Laravel, Livewire, Tailwind, y a integrar diseño con Figma, validaciones XML/DTD y contenedores con Docker. Me gusta explorar herramientas nuevas y mejorar continuamente mi flujo de trabajo.
            </p>

            <!-- Tecnologías favoritas -->
            <p class="font-semibold text-indigo-600 dark:text-indigo-400">
                ⚙️ Tecnologías favoritas: Laravel • Livewire • Tailwind CSS • SGML • Docker
            </p>
        </div>
    </div>
</x-app-layout>