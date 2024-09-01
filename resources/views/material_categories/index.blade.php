<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    @if (session()->has('success'))
        <div id="message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
            role="alert">
            <span class="block sm:inline">{{ session()->get('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="p-2">
        <div class="container mx-auto">

            <a href="{{ route('material_categories.create') }}" class="text-black  inline-flex items-center px-2 py-2">
                <i class="fas fa-plus-circle"></i>
            </a>

            <div id="categoryContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <div
                        class="bg-white overflow-hidden shadow-lg rounded-lg p-6 text-gray-900">
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
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('fade-out');
                    setTimeout(() => {
                        successMessage.remove();
                    }, 1000);
                }, 2000);
            }
        });        
    </script>

</x-app-layout>
