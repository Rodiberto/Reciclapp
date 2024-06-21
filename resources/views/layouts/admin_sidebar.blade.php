<aside class="w-48 px-4 bg-gray-800 text-white flex flex-col justify-between">

    {{-- <div class="p-4">
        <h2 class="text-lg text-center font-semibold">Panel de Administración</h2>
    </div> --}}

    <a href="{{ route('admin.dashboard') }}" class="py-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">
        <div class="">
            <img src="{{ asset('favicon.png') }}" width="40px" height="40px" alt="Favicon">
        </div>
        <div class="ml-3 font-bold italic text-lg text-white">
            RECICLAPP
        </div>
    </a>
    
    




    <nav class="mt-6">

        <nav class="mt-6">
            <a href="#"
                class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">
                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-users"></i>
                </div>
                <div class="ml-3 text-white">
                    Usuarios
                </div>
            </a>

            <a href="#"
                class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">
                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-truck"></i>
                </div>
                <div class="ml-3 text-white">
                    Recolectores
                </div>
            </a>

            <a href="#"
                class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">
                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-chart-bar"></i>
                </div>
                <div class="ml-3 text-white">
                    Reportes
                </div>
            </a>

            <a href="#"
                class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">
                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-chart-line"></i>
                </div>
                <div class="ml-3 text-white">
                    Gráficos
                </div>
            </a>

            <a href="#"
                class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">
                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-money-bill-wave"></i>
                </div>
                <div class="ml-3 text-white">
                    Precios
                </div>
            </a>

            <a href="#"
                class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">
                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-box-open"></i>
                </div>
                <div class="ml-3 text-white">
                    Materiales
                </div>
            </a>
        </nav>

    </nav>


    <div class="mt-auto">
        <div class="p-2 flex items-center bg-gray-100 rounded-lg">
            <div class="h-10 w-10 rounded-full overflow-hidden border border-gray-300">
                <img src="{{ asset('img/profile.png') }}" alt="Imagen de perfil" width="40px" height="40px">
            </div>
            <div class="ml-2 px-2 text-black">
                {{ Auth::user()->name }}
            </div>
        </div>

        <!-- Enlace al perfil -->
        <a href="{{ route('profile.edit') }}"
            class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer mt-3">
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
