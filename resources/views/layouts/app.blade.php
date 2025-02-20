<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <a href="/" class="text-xl font-bold text-gray-800">Contacts-App</a>

            <div x-data="{ open: false }" class="relative inline-block text-left">
                <!-- Botón para abrir el dropdown -->
                <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <!-- Mostrar imagen de perfil si existe -->
                    @if(auth()->user()->image)
                    <div class="flex items-center">
                        <img src="{{ asset('storage/img/' . auth()->user()->image) }}" alt="Imagen de Perfil" class="h-8 w-8 rounded-full mr-2">
                    </div>
                    @endif
                    <span class="text-gray-700 text-sm">{{ auth()->user()->name }}</span>
                    <!-- Icono para indicar el dropdown -->
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Menú desplegable -->
                <div x-show="open" @click.away="open = false" x-transition class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <!-- Opciones del menú -->
                        <a href="{{ route('profile.show', auth()->id()) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                            Perfil
                        </a>
                        @if(auth()->user()->role == 0)
                            <a href="{{route('admin')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                                Panel Administrativo
                            </a>
                        @endif
                        <form action="{{ route('cerrar_sesion') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </header>
    @yield('content')    
    <x-footer></x-footer>
</body>

</html>