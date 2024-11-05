<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center overflow-auto">
        <div class="p-8 bg-white rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">

            <div class="py-4 flex justify-between items-center">
                <a href="{{ route('materials.index') }}" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">Nuevo material</h1>
            </div>

            <div class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">
                <form method="POST" action="{{ route('materials.store') }}" enctype="multipart/form-data"
                    class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @csrf

                    <!-- Nombre del Material -->
                    <div>
                        <label for="name" class="block text-gray-700">Nombre del material</label>
                        <input id="name" type="text"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="name" value="{{ old('name') }}" required>
                        <span id="name-error" class="text-red-500 text-xs"></span>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-2">
                        <label for="material_category_id" class="block text-gray-700">Categoría</label>
                        <select id="material_category_id"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="material_category_id" required>
                            <option value="">Selecciona categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('material_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span id="category-error" class="text-red-500 text-xs"></span>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-2 sm:col-span-2">
                        <label for="description" class="block text-gray-700">Descripción</label>
                        <textarea id="description"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="description" rows="3">{{ old('description') }}</textarea>
                        <span id="description-error" class="text-red-500 text-xs"></span>
                    </div>

                    <!-- Peso -->
                    <div class="mb-2">
                        <label for="weight" class="block text-gray-700">Peso</label>
                        <input id="weight" type="text"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="weight" value="{{ old('weight') }}" required>
                        <span id="weight-error" class="text-red-500 text-xs"></span>
                    </div>

                    <!-- Valor -->
                    <div class="mb-2">
                        <label for="value" class="block text-gray-700">Valor</label>
                        <input id="value" type="text"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="value" value="{{ old('value') }}" required>
                        <span id="value-error" class="text-red-500 text-xs"></span>
                    </div>

                    <!-- Imagen del material -->
                    <div class="mb-2">
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

                    <div class="mb-2">
                        <label for="code" class="block text-gray-700">Código</label>
                        <input id="code" type="text"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="code" value="{{ old('code') }}" required>
                        <span id="code-error" class="text-red-500 text-xs"></span>
                    </div>

                    <!-- Botón Guardar -->
                    <div class="mb-2 sm:col-span-2">
                        <button type="submit"
                            class="w-full bg-green-800 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:bg-green-700">
                            Guardar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/filename_image.js') }}"></script>
    <script src="{{ asset('js/t-materials.js') }}"></script>
</x-app-layout>
