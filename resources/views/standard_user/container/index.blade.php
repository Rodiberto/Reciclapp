<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <style>
            #contenido {
                padding: 10px 10px 0px 10px;
            }
        </style>
    </head>

    <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8" id="contenido">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Contenedores</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6">
                    @if($hasContainers)
                        @foreach($containers as $container)
                            <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg flex flex-col items-center">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $container->bag_name }}</h2>
                                <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $container->description }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-3 text-center">
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">No tienes ningún contenedor.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
