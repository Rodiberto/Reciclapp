<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    @if (session()->has('success') || session()->has('error'))
        <div id="messageModal" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 text-center max-w-sm w-full">
                @if (session()->has('success'))
                    <div class="text-green-700 bg-white border-l-4 border-green-500 p-3 rounded-lg">
                        <strong>Éxito:</strong> {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="text-red-700 bg-white border-l-4 border-red-500 p-3 rounded-lg">
                        <strong>Error:</strong> {{ session()->get('error') }}
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="p-2">
        <div class="container mx-auto">

            <div class="flex items-center justify-center">
                <div class="flex items-center justify-start">
                    <a href="{{ route('material_categories.create') }}"
                        class="text-black inline-flex items-center px-2 py-2">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
                <div class="flex-1 text-center">
                    <h1 class="text-lg font-extrabold text-gray-900">
                        Categorías de los materiales reciclables
                    </h1>
                </div>
            </div>

            <div id="categoryContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @forelse ($categories as $category)
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6 text-gray-900">
                        <p class="font-bold text-center">{{ $category->name }}</p>
                        <p class="text-center">{{ $category->description }}</p>
                        <div class="mt-4 space-x-2">
                            <a href="{{ route('material_categories.edit', $category->id) }}" class="mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('material_categories.destroy', $category->id) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        <p>No hay categorías disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('messageModal');
            if (modal) {
                setTimeout(function() {
                    modal.style.display = 'none';
                }, 3000);
            }
        });
    </script>

</x-app-layout>
