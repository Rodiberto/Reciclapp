<x-app-layout>

    <style>
        #contenido {
            padding: 0px 10px 0px 10px
        }
    </style>
    {{-- <x-slot name="header">
        <div class="p-2 flex items-center bg-gray-100 rounded-lg">
            <div class="h-10 w-10 rounded-full overflow-hidden border border-gray-300">
                <img src="{{ asset('img/profile.png') }}" alt="Imagen de perfil" width="40px" height="40px">
            </div>
            <div class="ml-2 px-2 text-black">
                {{ Auth::user()->name }}
            </div>
        </div>
    </x-slot> --}}


    <div class="py-4 flex h-screen">

        <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8" id="contenido">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mb-6">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                       <p class="text-center">Usuarios</p> 
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                       <p class="text-center">Materiales reciclables</p> 
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-justify">

                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
