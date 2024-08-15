 <head>
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
 </head>

 <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-lg h-auto max-h-screen overflow-auto mx-auto">

     <form action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data"
         class="w-full">
         @csrf
         @method('PUT')

         <div class="grid grid-cols-2 gap-4">
             <!-- Primera columna -->
             <div>

                 <div class="mb-4 flex items-center justify-center">
                     <img src="{{ $material->image }}" alt="Imagen del material" class="w-30 h-20 mb-2">
                 </div>

                 <div class="mb-4">
                     <label for="image" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nueva
                         imagen</label>
                     <input type="file" id="image" name="image" class="hidden" onchange="updateFileName()">

                     <label for="image"
                         class="block cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:text-sm">
                         <span class="truncate py-4">Seleccionar archivo</span>
                     </label>

                     <x-input-error :messages="$errors->get('image')" class="mt-2" />
                 </div>
                 <span id="file-name-image"></span>



                 <div class="mb-4">
                     <label for="weight" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Peso</label>
                     <input id="weight" type="text"
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-700 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 @error('weight') border-red-500 dark:border-red-600 @enderror"
                         name="weight" value="{{ old('weight', $material->weight) }}" required>
                     @error('weight')
                         <span class="text-red-500 dark:text-red-400 text-sm mt-1">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 <div class="mb-4">
                     <label for="value" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Valor</label>
                     <input id="value" type="text"
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-700 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 @error('value') border-red-500 dark:border-red-600 @enderror"
                         name="value" value="{{ old('value', $material->value) }}" required>
                     @error('value')
                         <span class="text-red-500 dark:text-red-400 text-sm mt-1">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
             </div>

             <!-- Primera columna -->
             <div>
                 <div class="mb-4">
                     <label for="name"
                         class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nombre</label>
                     <input id="name" type="text"
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-700 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 @error('name') border-red-500 dark:border-red-600 @enderror"
                         name="name" value="{{ old('name', $material->name) }}" required>
                     @error('name')
                         <span class="text-red-500 dark:text-red-400 text-sm mt-1">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 <div class="mb-4">
                     <label for="material_category_id"
                         class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Categoría</label>
                     <select id="material_category_id"
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-700 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 @error('material_category_id') border-red-500 dark:border-red-600 @enderror"
                         name="material_category_id" required>
                         <option value="">Seleccione una categoría</option>
                         @foreach ($categories as $category)
                             <option value="{{ $category->id }}"
                                 {{ old('material_category_id', $material->material_category_id) == $category->id ? 'selected' : '' }}>
                                 {{ $category->name }}
                             </option>
                         @endforeach
                     </select>
                     @error('material_category_id')
                         <span class="text-red-500 dark:text-red-400 text-sm mt-1">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>


                 <div class="mb-4">
                     <label for="description"
                         class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Descripción</label>
                     <textarea id="description"
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-700 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 @error('description') border-red-500 dark:border-red-600 @enderror"
                         name="description">{{ old('description', $material->description) }}</textarea>
                     @error('description')
                         <span class="text-red-500 dark:text-red-400 text-sm mt-1">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
             </div>
         </div>

         <button type="submit"
             class="w-full bg-green-800 dark:bg-green-200 text-white dark:text-white 
         font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
         focus:ring-2 focus:bg-green-700 dark:focus:bg-white">
             Actualizar
         </button>
     </form>

 </div>
