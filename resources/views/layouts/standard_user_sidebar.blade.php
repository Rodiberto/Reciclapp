<aside id="sidebar" class="px-2 max-w-xs md:max-w-md lg:max-w-lg bg-custom text-white flex flex-col justify-between">

    <a href="{{ route('standard_user.dashboard') }}"
        class="py-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">

        <img src="{{ asset('favicon.png') }}" width="40px" height="40px" alt="Favicon">

        <div class="font-bold italic text-white reciclapp">
            <strong>reciclapp</strong>
        </div>

    </a>

    <nav class="mt-6 flex-1">

        <a id="collapse-btn" href="#"
            class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">

            <div class="p-2 rounded-full bg-gray-100">
                <i class="text-black fas fa-bars fa-sm"></i>
            </div>

            <div class="ml-3 text-white menu">
                Menú
            </div>

        </a>

        <a href="#"
            class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">

            <div class="p-2 rounded-full bg-gray-100">
                <i class="text-black fas fa-tachometer-alt"></i>
            </div>

            <div class="ml-3 text-white text">
                Dashboard
            </div>

        </a>

    </a>

    </nav>

    <div class="mt-auto">

        <a href="{{ route('profile.edit') }}" class="p-1 flex items-center bg-gray-100 rounded-lg prof">

            <div class="flex justify-center items-center h-10 w-10 overflow-hidden ">
                <img src="{{ asset(Auth::user()->photo) }}" alt="Foto de perfil" width="40px"
                    height="40px" class="rounded-full">
            </div>

            <div class="ml-2 px-2 text-black username text-sm">
                {{ Auth::user()->name }}
            </div>

        </a>

        <form method="POST" action="{{ route('logout') }}" style="display: inline;">

            @csrf

            <button type="submit" class="p-2 flex items-center hover:bg-gray-700 rounded transition duration-200 cursor-pointer">

                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-sign-out-alt"></i>
                </div>

                <span class="ml-3 text-white salir">Cerrar sesión</span>

            </button>

        </form>

    </div>

</aside>

<script src="{{ asset('js/sidebar.js') }}"></script>
