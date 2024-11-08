 <x-app-layout>

     <head>
         <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
     </head>

     <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center overflow-auto">
         <div class="p-8 bg-white rounded-lg shadow-lg w-full max-w-2xl">

             <div class="py-4 flex justify-between items-center">
                 <a href="{{ route('materials.index') }}" class="text-gray-600 hover:text-gray-800">
                     <i class="fas fa-times"></i>
                 </a>
             </div>

             <div class="flex items-center justify-center">
                 <h1 class="text-2xl font-semibold text-gray-800">Editar material</h1>
             </div>

             <div class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">

                 <form action="{{ route('materials.update', $material->id) }}" method="POST"
                     enctype="multipart/form-data" class="w-full">
                     @csrf
                     @method('PUT')

                     <div class="grid grid-cols-2 gap-4">
                         <!-- Primera columna -->
                         <div>

                             <div class="mb-4 flex items-center justify-center">
                                 <img src="{{ $material->image }}" alt="Imagen del material" class="w-30 h-20 mb-2">
                             </div>

                             <div class="mb-4">
                                 <label for="image" class="block text-gray-700 font-medium mb-2">Nueva
                                     imagen</label>
                                 <input type="file" id="image" name="image" class="hidden" accept="image/*"
                                     onchange="updateFileName()">

                                 <label for="image"
                                     class="block cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-green-700 w-full sm:text-sm">
                                     <span class="truncate py-4">Seleccionar archivo</span>
                                 </label>

                                 <x-input-error :messages="$errors->get('image')" class="mt-2" />
                             </div>
                             <span id="materials"></span>



                             <div class="mb-4">
                                 <label for="weight" class="block text-gray-700 font-medium mb-2">Peso</label>
                                 <input id="weight" type="number" step="0.01"
                                     class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 @error('weight') border-red-500 @enderror"
                                     name="weight" value="{{ old('weight', $material->weight) }}" required>
                                 <span id="weight-error" class="text-red-500 text-xs"></span>
                             </div>

                             <div class="mb-4">
                                 <label for="value" class="block text-gray-700 font-medium mb-2">Valor</label>
                                 <input id="value" type="number" step="0.01"
                                     class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 @error('value') border-red-500 @enderror"
                                     name="value" value="{{ old('value', $material->value) }}" required>
                                 <span id="value-error" class="text-red-500 text-xs"></span>
                             </div>

                             <div class="mb-4">
                                 <label for="code" class="block text-gray-700 font-medium mb-2">Código</label>
                                 <input id="code" type="number" step="0.01"
                                     class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 @error('value') border-red-500 @enderror"
                                     name="code" value="{{ old('code', $material->code) }}" required>
                                 <span id="code-error" class="text-red-500 text-xs"></span>
                             </div>
                         </div>

                         <!-- Primera columna -->
                         <div>
                             <div class="mb-4">
                                 <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
                                 <input id="name" type="text"
                                     class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 @error('name') border-red-500 @enderror"
                                     name="name" value="{{ old('name', $material->name) }}" required>
                                 <span id="name-error" class="text-red-500 text-xs"></span>
                             </div>

                             <div class="mb-4">
                                 <label for="material_category_id"
                                     class="block text-gray-700 font-medium mb-2">Categoría</label>
                                 <select id="material_category_id"
                                     class="mt-1 block w-full p-2 border  rounded-md shadow-sm focus:ring-green-700 focus:border-green-700  @error('material_category_id') border-red-500 @enderror"
                                     name="material_category_id" required>
                                     <option value="">Seleccione una categoría</option>
                                     @foreach ($categories as $category)
                                         <option value="{{ $category->id }}"
                                             {{ old('material_category_id', $material->material_category_id) == $category->id ? 'selected' : '' }}>
                                             {{ $category->name }}
                                         </option>
                                     @endforeach
                                 </select>
                                 <span id="category-error" class="text-red-500 text-xs"></span>
                             </div>


                             <div class="mb-4">
                                 <label for="description"
                                     class="block text-gray-700 font-medium mb-2">Descripción</label>
                                 <textarea id="description"
                                     class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-700 focus:border-green-700 @error('description') border-red-500 @enderror"
                                     name="description" required>{{ old('description', $material->description) }}</textarea>
                                 <span id="description-error" class="text-red-500 text-xs"></span>
                             </div>
                         </div>
                     </div>

                     <button type="submit"
                         class="w-full bg-green-800 text-white
                    font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
                    focus:ring-2 focus:bg-green-700">
                         Actualizar
                     </button>
                 </form>


             </div>
         </div>
     </div>


     <script src="{{ asset('js/filename_image.js') }}"></script>
     <script src="{{ asset('js/t-materials.js') }}"></script>


 </x-app-layout>
