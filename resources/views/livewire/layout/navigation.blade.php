<div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <!-- Logo de Libro SVG -->
                            <svg width="40" height="40" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto">
                                <defs>
                                    <linearGradient id="bookGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#4F46E5;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#7C3AED;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="pageGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#F8FAFC;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#E2E8F0;stop-opacity:1" />
                                    </linearGradient>
                                    <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                                        <dropShadow dx="2" dy="4" stdDeviation="3" flood-color="#000000" flood-opacity="0.1"/>
                                    </filter>
                                </defs>
                                
                                <!-- Libro base -->
                                <rect x="25" y="30" width="70" height="60" rx="4" ry="4" fill="url(#bookGradient)" filter="url(#shadow)"/>
                                
                                <!-- Páginas del libro -->
                                <rect x="30" y="25" width="60" height="55" rx="2" ry="2" fill="url(#pageGradient)" stroke="#CBD5E1" stroke-width="1"/>
                                <rect x="32" y="27" width="56" height="51" rx="1" ry="1" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="0.5"/>
                                
                                <!-- Líneas de texto -->
                                <line x1="38" y1="35" x2="70" y2="35" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
                                <line x1="38" y1="42" x2="82" y2="42" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
                                <line x1="38" y1="49" x2="75" y2="49" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
                                <line x1="38" y1="56" x2="80" y2="56" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
                                <line x1="38" y1="63" x2="68" y2="63" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
                                
                                <!-- Marcador -->
                                <rect x="85" y="25" width="3" height="40" fill="#EF4444" rx="1.5"/>
                                
                                <!-- Highlight/brillo en la portada -->
                                <ellipse cx="45" cy="45" rx="15" ry="8" fill="#FFFFFF" opacity="0.2"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link :href="route('perfil.dev')" :active="request()->routeIs('perfil.dev')">
                            🧑‍💻 Desarrollador
                        </x-nav-link>

                        <!-- Enlace a Biblioteca 3i -->
                        <x-nav-link href="/biblioteca3i" :active="request()->is('biblioteca3i*')">
                            📚 Biblioteca 3i
                        </x-nav-link>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition">
                                {{ Auth::user()->name }}

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M5.23 7.21a1 1 0 011.42 0L10 
                                              10.59l3.35-3.38a1 1 0 111.42 1.42l-4.06 
                                              4.06a1 1 0 01-1.42 0L5.23 
                                              8.63a1 1 0 010-1.42z" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile -->
                            <x-dropdown-link :href="route('profile')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
              

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('perfil.dev')" :active="request()->routeIs('perfil.dev')">
                    🧑‍💻 Desarrollador
                </x-responsive-nav-link>

                <!-- Enlace responsive a Biblioteca 3i -->
                <x-responsive-nav-link href="/biblioteca3i" :active="request()->is('biblioteca3i*')">
                    📚 Biblioteca 3i
                </x-responsive-nav-link>
            </div>
       
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </div>
                </div>
              

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>