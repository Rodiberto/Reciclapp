<x-app-layout>
    <style>
        #contenido {
            padding: 0px 10px 0px 10px;
        }
    </style>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between mb-4">
                <a href="{{ route('material_categories.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Agregar</a>
            </div>

            <div id="categoryContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6 text-gray-900 dark:text-gray-100">
                        <p class="font-bold text-center">{{ $category->name }}</p>
                        <p class="text-center">{{ $category->description }}</p>
                        <div class="mt-4 flex justify-center space-x-2">
                            <a href="{{ route('material_categories.edit', $category->id) }}" class="text-yellow-500 hover:text-yellow-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('material_categories.destroy', $category->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
