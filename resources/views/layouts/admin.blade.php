<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <a href="/" class="text-xl font-bold text-gray-800">Contacts-App</a>

            <form action="{{route('cerrar_sesion')}}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </header>
    @yield('content')
    <footer></footer>
</body>

</html>