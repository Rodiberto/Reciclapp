<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reciclapp') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bg_custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar_custom.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full transition-colors duration-300 ease-in-out z-50" id="header">
        <nav
            class="container mx-auto flex items-center justify-between p-4 bg-gray-800 bg-opacity-0 transition-colors duration-300 ease-in-out">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" class="h-8 w-8">
                <h1 class="text-xl font-semibold text-gray-500">Reciclapp</h1>
            </div>

            <button class="lg:hidden flex items-center text-gray-500 focus:outline-none" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="hidden lg:flex flex-grow justify-center space-x-4">
                <a href="/" class="text-gray-500 hover:text-green-800 transition">Inicio</a>
                <a href="{{ route('servicios') }}" class="text-gray-500 hover:text-green-800 transition">Servicios</a>
                <a href="{{ route('contactanos') }}"
                    class="text-gray-500 hover:text-green-800 transition">Contáctanos</a>
                <a href="/login" class="text-gray-500 hover:text-green-800 transition">Iniciar Sesión</a>
                <a href="/register" class="text-gray-500 hover:text-green-800 transition">Registrarse</a>
            </div>


            <div class="lg:hidden fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden" id="mobile-menu">
                <div class="flex flex-col items-center justify-center h-full">
                    <a href="/" class="text-gray-500 py-2 text-lg">Inicio</a>
                    <a href="{{ route('servicios') }}" class="text-gray-500 py-2 text-lg">Servicios</a>
                    <a href="{{ route('contactanos') }}" class="text-gray-500 py-2 text-lg">Contáctanos</a>
                    <a href="/login" class="text-gray-500 py-2 text-lg">Iniciar Sesión</a>
                    <a href="/register" class="text-gray-500 py-2 text-lg">Registrarse</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="pt-16">
        <div class="">
            @yield('content')
        </div>
    </main>

    <footer class="bg-green-600 text-white py-12">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-4">
            <div class="text-center lg:text-left">
                <div class="mb-4">
                    <img src="img/logo.png" alt="Reciclapp Logo" class="h-12 mx-auto lg:mx-0">
                </div>
                <p class="mb-4">Somos una organización dedicada al reciclaje y sostenibilidad, ayudando a reducir el
                    impacto ambiental y promover prácticas responsables.</p>
                <div class="flex justify-center lg:justify-start space-x-4">
                    <a href="https://www.facebook.com/tu-pagina-facebook" target="_blank" class="text-white text-2xl">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/tu-cuenta-instagram" target="_blank" class="text-white text-2xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>


            <div class="text-center lg:text-left">
                <h4 class="text-xl font-semibold mb-4">Nuestros Servicios</h4>
                <ul>
                    <li><a href="#" class="hover:text-gray-300">Escaneo de Residuos</a></li>
                    <li><a href="#" class="hover:text-gray-300">Ubicaciones de Depósitos</a></li>
                    <li><a href="#" class="hover:text-gray-300">Programación de Recolección</a></li>
                    <li><a href="#" class="hover:text-gray-300">Recordatorio y Notificaciones</a></li>
                </ul>
            </div>

            <div class="text-center lg:text-left">
                <h4 class="text-xl font-semibold mb-4">Contáctanos</h4>
                <ul>
                    <li>Teléfono: +52 919 147 22 15</li>
                    <li>Email: info.reciclapp@gmail.com</li>
                    <li>Dirección: C.P. 29950, Ocosingo, Chis.</li>
                </ul>
            </div>

            <div class="text-center lg:text-left">
                <h4 class="text-xl font-semibold mb-4">Información Adicional</h4>
                <ul>
                    <li><a href="{{ route('aviso_privacidad') }}" class="hover:text-gray-300">Aviso de Privacidad</a></li>
                    <li><a href="{{ route('terminos_condiciones') }}" class="hover:text-gray-300">Términos y Condiciones</a></li>
                </ul>
            </div>
        </div>

        <div class="bg-green-600 text-center py-4 mt-8">
            <p>&copy; 2024 Reciclapp. Todos los derechos reservados.</p>
        </div>
    </footer>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const header = document.getElementById('header');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuToggle = document.getElementById('menu-toggle');

            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            window.addEventListener('scroll', () => {
                if (window.scrollY > 10) {
                    header.style.backgroundColor = '#000000';
                    header.classList.add('bg-opacity-90', 'text-white');
                } else {
                    header.style.backgroundColor = '';
                    header.classList.remove('bg-opacity-90', 'text-white');
                }
            });

        });
    </script>

</body>

</html>
