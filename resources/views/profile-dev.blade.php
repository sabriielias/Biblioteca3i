<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Perfil del Equipo Desarrollador
        </h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow text-center">
            
            <!-- Imágenes de perfiles-->
            <div class="flex justify-center items-center gap-4 mb-6">
                <img src="{{ asset('images/fotopatri.png') }}" alt="Foto de Patricia"
                    class="rounded-full shadow w-20 h-20 object-cover">
                <img src="{{ asset('images/2.png') }}" alt="Foto de Sabrina"
                    class="rounded-full shadow w-20 h-20 object-cover">
            </div>

            <!-- Nombres -->
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">
                Patricia Alejandra Viera & Sabrina Elias
            </h3>

            <!-- Descripción breve -->
            <p class="text-sm text-gray-500 dark:text-gray-300 mb-4">
                Estudiantes • Programación III
            </p>

            <!-- Biografía conjunta -->
            <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed text-justify">
                Somos estudiantes de desarrollo web y durante este proyecto trabajamos de manera equitativa en todas las etapas: diseño lógico, desarrollo backend y frontend, validaciones, pruebas funcionales y documentación. 
                Nuestra colaboración nos permitió construir una aplicación sólida, combinando nuestras habilidades y aprendiendo mutuamente en cada paso del proceso.
            </p>

            <!-- Tecnologías favoritas -->
            <p class="font-semibold text-indigo-600 dark:text-indigo-400 mb-6">
                ⚙️ Tecnologías favoritas: Laravel • Livewire • Tailwind CSS • SGML • Docker
            </p>

            <!-- Sobre el proyecto -->
            <hr class="my-6 border-gray-300 dark:border-gray-700">
            <div class="mt-8 text-gray-800 dark:text-gray-300 text-left">
                <h2 class="text-xl font-semibold mb-2">📘 Sobre este proyecto</h2>
                <p class="leading-relaxed">
                    <strong>Biblioteca 3i</strong> fue desarrollado como parte de la cursada de <strong>Programación III</strong>, aplicando autenticación, diseño de rutas protegidas, vistas dinámicas y componentes interactivos con Livewire. 
                    Además, se utilizaron herramientas de pruebas como Postman, diseño de XML/DTD y se trabajó con Tailwind para estilos consistentes y modernos.
                </p>
                <p class="mt-2">
                    Cada funcionalidad —desde el CRUD de libros hasta la vista principal— fue concebida y ajustada por ambas integrantes, manteniendo una comunicación constante y una división equilibrada de tareas técnicas y organizativas.
                </p>
            </div>

            <!-- Equipo -->
            <hr class="my-6 border-gray-300 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">
                👥 Integrantes del equipo
            </h2>
            <ul class="list-disc pl-6 text-gray-800 dark:text-gray-300 text-left">
                <li><strong>Patricia Alejandra Viera</strong> – Desarrollo conjunto del sistema, interfaz Livewire, diseño de vistas, validaciones y documentación final.</li>
                <li><strong>Sabrina Elias</strong> – Desarrollo conjunto del sistema, lógica de rutas y controladores, pruebas técnicas y documentación final.</li>
            </ul>

            <!-- Botón para volver -->
            <div class="mt-8">
                <a href="{{ route('home') }}"
                   class="inline-block bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700 transition">
                    ← Volver a Biblioteca 3i
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
