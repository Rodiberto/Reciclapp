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

            <button id="openModal" class="text-black p-2">
                <i class="px-1 fas fa-plus-circle"></i>
                <span>Nuevo</span>
            </button>

            <div id="categoryContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <div
                        class="bg-white overflow-hidden shadow-lg rounded-lg p-6 text-gray-900">
                        <p class="font-bold text-center">{{ $category->name }}</p>
                        <p class="text-center">{{ $category->description }}</p>
                        <div class="mt-4 space-x-2">
                            <a href="#" class=" mr-2 open-edit-modal" data-id="{{ $category->id }}">
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



    <div id="modal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden overflow-auto">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl">
            <div class="p-4 flex justify-between items-center">
                <button id="closeModal"
                    class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">Nueva categoría</h1>
            </div>

            <div id="modalContent"
                class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">

            </div>
        </div>
    </div>

    <div id="editModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden overflow-auto">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl">
            <div class="p-4 flex justify-between items-center">
                <button id="closeEditModal"
                    class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">Editar categoría</h1>
            </div>

            <div id="editModalContent"
                class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">

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

        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('openModal').addEventListener('click', function() {
                fetch('{{ route('material_categories.create') }}')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('modalContent').innerHTML = html;
                        document.getElementById('modal').classList.remove('hidden');
                    })
                    .catch(error => console.error('Error loading modal content:', error));
            });

            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });

            document.getElementById('modal').addEventListener('click', function(event) {
                if (event.target === this) {
                    this.classList.add('hidden');
                }
            });


            document.querySelectorAll('.open-edit-modal').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const CategoryId = this.getAttribute('data-id');

                    fetch(`{{ url('/material_categories') }}/${CategoryId}/edit`)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('editModalContent').innerHTML = html;
                            document.getElementById('editModal').classList.remove('hidden');
                        })
                        .catch(error => console.error('Error loading modal content:', error));
                });
            });

            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });

            document.getElementById('editModal').addEventListener('click', function(event) {
                if (event.target === this) {
                    this.classList.add('hidden');
                }
            });
        });
        
    </script>

</x-app-layout>
