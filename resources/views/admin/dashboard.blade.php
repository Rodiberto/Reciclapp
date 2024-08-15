<x-app-layout>
    <style>
        #contenido {
            padding: 0px 10px 0px 10px;
        }
    </style>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        </head>

    <div class="py-4 flex h-screen">
        <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8" id="contenido">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mb-6">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Usuarios recolectores</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($users as $user)
                                <a href="{{ route('users.index', $user->id) }}"class="flex flex-col items-center bg-gray-50 dark:bg-gray-700 rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center dark:bg-gray-700 rounded-lg p-4">
                                        <div class="flex justify-center mb-4">
                                            <img src="{{ $user->profile_photo_path }}" alt="Foto de perfil"
                                                class="w-20 h-20 rounded-full">
                                        </div>
                                        <div class="text-center">
                                            <p class="font-bold">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Materiales reciclables</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($materials as $material)
                                <a href="{{ route('materials.index', $material->id) }}"class="flex flex-col items-center bg-gray-50 dark:bg-gray-700 rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-gray-600">

                                    <div class="flex flex-col items-center dark:bg-gray-700 rounded-lg p-4">
                                        <div class="flex justify-center mb-4">
                                            <img src="{{ $material->image }}" alt="Imagen del material"
                                                class="w-20 h-20 rounded-full">
                                        </div>
                                        <div class="text-center">
                                            <p class="font-bold">{{ $material->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-justify">

                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
