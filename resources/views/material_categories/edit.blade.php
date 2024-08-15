<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="container mx-auto px-4 py-8 max-w-lg">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">Hay algunos problemas con su entrada.</span>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('material_categories.update', $material_category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nombre de la categoría</label>
            <input type="text" id="name" name="name" class="border border-gray-300 rounded-lg shadow-sm px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('name', $material_category->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-semibold mb-2">Descripción</label>
            <textarea id="description" name="description" class="border border-gray-300 rounded-lg shadow-sm px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description', $material_category->description) }}</textarea>
        </div>

        <button type="submit"
            class="w-full bg-green-800 dark:bg-green-200 text-white dark:text-white 
            font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
            focus:ring-2 focus:bg-green-700 dark:focus:bg-white">
            Actualizar
        </button>
    </form>
</div>
