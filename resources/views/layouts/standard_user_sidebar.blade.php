<!-- resources/views/layouts/standard_user_sidebar.blade.php -->

<aside class="w-48 bg-gray-800 text-white">
    <div class="p-4">
        <h2 class="text-lg font-semibold">Panel de Usuario Estándar</h2>
    </div>
    <nav class="mt-6">
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Mi perfil</a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Configuración de cuenta</a>
    </nav>

    <div class="mt-auto">
        <div class="p-2 flex items-center bg-gray-100 rounded-lg">
            <div class="h-10 w-10 rounded-full overflow-hidden border border-gray-300">
                <img src="{{ asset('img/profiles.png') }}" alt="Imagen de perfil" width="40px" height="40px">
            </div>
            <div class="ml-2 px-2 text-black">
                {{ Auth::user()->name }}
            </div>
        </div>
    
        <!-- Enlace al perfil -->
        <a href="{{ route('profile.edit') }}" class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer mt-3">
            <div class="p-2 rounded-full bg-gray-100">
                <i class="text-black fas fa-user-circle"></i>
            </div>
            <div class="ml-3 text-white">
                Perfil
            </div>
        </a>
    
        <!-- Botón de cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}" class="mt-3 space-y-1">
            @csrf
            <button type="submit"
                class="block w-full text-left py-4 px-4 rounded transition duration-200 hover:bg-gray-700">
                Cerrar sesión
            </button>
        </form>
    </div>

</aside>
