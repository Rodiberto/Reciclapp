<head>

    <style>
        .flex-1.overflow-y-auto.mt-6 {
            scrollbar-width: none;
            /* Para Firefox */
        }

        .flex-1.overflow-y-auto.mt-6::-webkit-scrollbar {
            display: none;
            /* Para Chrome, Safari y otros basados en WebKit */
        }
    </style>

</head>


<aside id="sidebar"
    class="px-2 max-w-xs md:max-w-md lg:max-w-lg bg-custom text-white flex flex-col justify-between h-screen">



    <!--Encabezado -->
    <div>
        <a href="{{ route('standard_user.dashboard') }}"
            class="py-2 flex items-center hover:bg-green-600 rounded transition duration-200 cursor-pointer">

            <img src="{{ asset('favicon.png') }}" width="40px" height="40px" alt="Favicon">

            <div class="font-bold italic text-white reciclapp">
                <strong>reciclapp</strong>
            </div>

        </a>
    </div>






    <!--Contenido con overflow -->
    <div class="flex-1 overflow-y-auto mt-6">
        <nav>

            <a id="collapse-btn" href="#"
                class="p-2 flex items-center hover:bg-green-600 rounded transition duration-200 cursor-pointer">

                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-bars fa-sm"></i>
                </div>

                <div class="ml-3 text-white menu">
                    Menú
                </div>

            </a>


            <a href="{{ route('standard_user.dashboard') }}"
                class="p-2 flex items-center hover:bg-green-600 rounded transition duration-200 cursor-pointer">

                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-tachometer-alt"></i>
                </div>

                <div class="ml-3 text-white text">
                    Dashboard
                </div>

            </a>



            <a href="{{ route('requests_user.index') }}"
                class="p-2 flex items-center hover:bg-green-600 rounded transition duration-200 cursor-pointer">

                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-file-alt"></i>
                </div>

                <div class="ml-3 text-white text">
                    Solicitudes
                </div>

            </a>


            <a href="{{ route('history_user.index') }}"
                class="p-2 flex items-center hover:bg-green-600 rounded transition duration-200 cursor-pointer">

                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-history"></i>
                </div>

                <div class="ml-3 text-white text">
                    Historial
                </div>

            </a>


          {{--  <a href="{{ route('standard_user.chart') }}"
                class="p-2 flex items-center hover:bg-green-600 rounded transition duration-200 cursor-pointer">

                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-chart-bar"></i>
                </div>

                <div class="ml-3 text-white text">
                    Gráficas
                </div>

            </a>--}}

        </nav>
    </div>








    <!--Contenido Perfil y Log Out -->
    <div class="mt-auto">
        <a href="{{ route('profile.edit') }}" class="p-1 flex items-center bg-gray-100 rounded-lg prof">
            <div class="flex justify-center items-center h-10 w-10 overflow-hidden">
                <img src="{{ asset(Auth::user()->photo) }}" alt="Foto de perfil" width="40px" height="40px"
                    class="rounded-full">
            </div>
            <div class="ml-2 px-2 text-black username text-sm">
                {{ Auth::user()->name }}
            </div>
        </a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit"
                class="p-2 flex items-center hover:bg-green-600 rounded transition duration-200 cursor-pointer">
                <div class="p-2 rounded-full bg-gray-100">
                    <i class="text-black fas fa-sign-out-alt"></i>
                </div>
                <span class="ml-3 text-white salir">Cerrar sesión</span>
            </button>
        </form>
    </div>



</aside>

<script src="{{ asset('js/sidebar.js') }}"></script>
