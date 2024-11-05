<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center overflow-auto">
        <div class="p-8 bg-white rounded-lg shadow-lg w-full max-w-2xl">

            <div class="py-4 flex justify-between items-center">
                <a href="{{ route('material_categories.index') }}" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">Nueva categoría</h1>
            </div>

            <div class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">

                <form action="{{ route('material_categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="w-full text-gray-700 font-medium mb-2">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="border border-gray-300 rounded-lg shadow-sm px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-green-700"
                            value="{{ old('name') }}" required>

                        <span id="name-error" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="w-full text-gray-700 font-medium mb-2">Descripción</label>
                        <textarea name="description" id="description" required
                            class="border border-gray-300 rounded-lg shadow-sm px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-green-700">{{ old('description') }}</textarea>
                        <span id="description-error" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-medium">Imagen</label>
                        <input type="file" id="image" name="image" class="hidden" accept="image/*"
                            onchange="updateFileName()">
                        <label for="image"
                            class="block cursor-pointer p-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 w-full sm:text-sm">
                            <span class="truncate py-4">Seleccionar archivo</span>
                        </label>
                        <span id="materials"></span>
                        <span id="image-error" class="text-red-500 text-xs"></span>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-800 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
                        focus:ring-2 focus:bg-green-700">
                        Guardar
                    </button>

                </form>



            </div>
        </div>
    </div>

    <script src="{{ asset('js/t-material-categories.js') }}"></script>
    <script src="{{ asset('js/filename_image.js') }}"></script>


</x-app-layout>
