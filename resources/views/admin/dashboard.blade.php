<x-app-layout>
    <style>
        #contenido {
            padding: 0px 10px 0px 10px;
        }
    </style>

    <div class="py-4 flex h-screen">
        <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8" id="contenido">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-center font-bold mb-4">Usuarios</p>
                        @foreach ($users as $user)
                            <div class="mb-2">
                                <p><strong>Nombre:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                            </div>
                            @if (!$loop->last)
                                <hr class="my-2">
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-center font-bold mb-4">Materiales</p>
                        @foreach ($materials as $material)
                            <div class="mb-2">
                                <p><strong>Nombre:</strong> {{ $material->name }}</p>
                                <p><strong>Descripción:</strong> {{ $material->description }}</p>
                            </div>
                            @if (!$loop->last)
                                <hr class="my-2">
                            @endif
                        @endforeach
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

