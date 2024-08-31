<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<div class="bg-white p-6 rounded-lg shadow-lg max-w-lg h-auto max-h-screen overflow-auto">
    <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
        @csrf

        <div class="grid grid-cols-2 gap-4">

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
                <input id="name" type="text" placeholder=""
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 sm:text-sm {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}"
                    name="name" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Imagen</label>
                <input type="file" id="image" name="image" class="hidden" onchange="updateFileName()" required>

                <label for="image"
                    class="block cursor-pointer p-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-green-700 w-full sm:text-sm">
                    <span class="truncate py-4">Seleccionar archivo</span>
                </label>

                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                <span id="file-name-image"></span>
            </div>

            <div class="mb-4">
                <label for="material_category_id" class="block text-gray-700 font-medium mb-2">Categoría</label>
                <select id="material_category_id"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 sm:text-sm {{ $errors->has('material_category_id') ? 'border-red-500' : 'border-gray-300' }}"
                    name="material_category_id" required>
                    <option value="" class="bg-green-800">Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('material_category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('material_category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Descripción</label>
                <textarea id="description" placeholder=""
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 sm:text-sm {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"
                    name="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="weight" class="block text-gray-700 font-medium mb-2">Peso</label>
                <input id="weight" type="number" step="0.01" placeholder="0.00"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 sm:text-sm {{ $errors->has('weight') ? 'border-red-500' : 'border-gray-300' }}"
                    name="weight" value="{{ old('weight') }}" required>
                @error('weight')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="value" class="block text-gray-700 font-medium mb-2">Valor</label>
                <input id="value" type="number"  step="0.01" placeholder="0.00"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 sm:text-sm {{ $errors->has('value') ? 'border-red-500' : 'border-gray-300' }}"
                    name="value" value="{{ old('value') }}" required>
                @error('value')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


        </div>

        <button type="submit"
            class="w-full bg-green-800 text-white 
            font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
            focus:ring-2 focus:bg-green-700">
            Guardar
        </button>
    </form>
</div>
