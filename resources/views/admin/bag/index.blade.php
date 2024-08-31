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

            <button id="openBagModal" class="text-black">
                <i class="px-1 fas fa-plus-circle"></i>
                <span>Nuevo</span>
            </button>

            <div id="bagContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 mt-6">
                @foreach ($bags as $bag)
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6 text-gray-900">
                        <p class="font-bold text-center">{{ $bag->name }}</p>
                        <div class="mt-4 space-x-2 text-center">
                            <a href="#" class="mr-2 open-edit-bag-modal" data-id="{{ $bag->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.bags.destroy', $bag->id) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta bolsa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div id="bagModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden overflow-auto">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl">
            <div class="p-4 flex justify-between items-center">
                <button id="closeBagModal" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">Nueva bolsa</h1>
            </div>
            <div id="bagModalContent"
                class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">

            </div>
        </div>
    </div>

    <div id="editBagModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden overflow-auto">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl">
            <div class="p-4 flex justify-between items-center">
                <button id="closeEditBagModal" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">Editar bolsa</h1>
            </div>
            <div id="editBagModalContent"
                class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('openBagModal').addEventListener('click', function() {
                fetch('{{ route('admin.bags.create') }}')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('bagModalContent').innerHTML = html;
                        document.getElementById('bagModal').classList.remove('hidden');
                    })
                    .catch(error => console.error('Error loading modal content:', error));
            });

            document.getElementById('closeBagModal').addEventListener('click', function() {
                document.getElementById('bagModal').classList.add('hidden');
            });


            document.getElementById('bagModal').addEventListener('click', function(event) {
                if (event.target === this) {
                    this.classList.add('hidden');
                }
            });

            document.querySelectorAll('.open-edit-bag-modal').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const bagId = this.getAttribute('data-id');

                    fetch(`{{ url('/admin/bags') }}/${bagId}/edit`)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('editBagModalContent').innerHTML = html;
                            document.getElementById('editBagModal').classList.remove('hidden');
                        })
                        .catch(error => console.error('Error loading modal content:', error));
                });
            });

            document.getElementById('closeEditBagModal').addEventListener('click', function() {
                document.getElementById('editBagModal').classList.add('hidden');
            });

            document.getElementById('editBagModal').addEventListener('click', function(event) {
                if (event.target === this) {
                    this.classList.add('hidden');
                }
            });
        });
    </script>

</x-app-layout>
