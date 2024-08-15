<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <style>
        #contenido {
            padding: 0px 10px 0px 10px;
        }
    </style>

    @if (session()->has('success'))
        <div id="message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
            role="alert">
            <span class="block sm:inline">{{ session()->get('success') }}</span>
        </div>
    @endif

    <div class="py-4 flex h-screen">
        <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8" id="contenido">

            <div class="flex justify-between mb-4 text-black dark:bg-gray-800 dark:text-white">
                <div>
                    <button id="gridView" class="px-2 text-black dark:bg-gray-800 dark:text-white ml-2">
                        <i class="fas fa-th"></i>
                    </button>

                    <button id="listView" class="text-black dark:bg-gray-800 dark:text-white mr-2">
                        <i class="fas fa-list"></i>
                    </button>

                    <a href="{{route('generate.report')}}" target="_blank" class="text-black dark:bg-gray-800 dark:text-white inline-flex items-center px-2 py-1">
                        <i class="fas fa-file-pdf mr-2 text-red-700 "></i> 
                    </a>
                    

                    <button id="openModal" class="text-black dark:bg-gray-800 dark:text-white">
                        <i class="fas fa-plus-circle"></i>
                        {{-- <span>Nuevo</span> --}}
                    </button>
                    
                </div>

                <div>
                    <input type="text" placeholder="Buscar material..."
                        class="border border-transparent rounded px-2 py-1 dark:border-gray-600 dark:bg-white dark:text-black"
                        id="searchMaterial">
                </div>

                <div>
                    <form method="GET" action="{{ route('materials.index') }}" class="inline-block">
                        <select name="category" onchange="this.form.submit()"
                            class="px-2 py-1 border border-transparent rounded dark:border-transparent dark:bg-gray-700 dark:text-gray-200">
                            <option value="">Categorías</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                
            </div>

            <div id="materialContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($materials as $material)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg material-item">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex justify-center mb-4">
                                <img src="{{ $material->image }}" alt="Imagen del material"
                                    class="w-20 h-20 rounded-full">
                            </div>
                            <p class="flex justify-center"><strong class="px-2">Nombre:</strong> {{ $material->name }}</p>
                            <p class="flex justify-center"><strong class="px-2">Descripción</strong>
                            </p>
                            <p class="flex text-justify">{{ $material->description }}</p>
                            
                            <p class="flex justify-center"><strong class="px-2">Categoría:</strong> {{ $material->category->name }}
                            </p>
                            <p class="flex justify-center"><strong class="px-2">Peso:</strong> {{ $material->weight }}</p>
                            <p class="flex justify-center"><strong class="px-2">Valor:</strong> {{ $material->value }}</p>
                            <div class="mt-4">
                                <a href="#" class=" mr-2 open-edit-modal"
                                    data-id="{{ $material->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('materials.destroy', $material->id) }}" method="POST"
                                    style="display: inline-block;"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este material?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="materialTable" class="hidden">
                <table class="table-auto w-full mt-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Imagen</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Categoría</th>
                            <th class="px-4 py-2">Peso</th>
                            <th class="px-4 py-2">Valor</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $material)
                            <tr>
                                <td class="border px-4 py-2">{{ $material->name }}</td>
                                <td class="border px-4 py-2"><img src="{{ $material->image }}"
                                        alt="Imagen del material" class="w-10 h-10"></td>
                                <td class="border px-4 py-2">{{ $material->description }}</td>
                                <td class="border px-4 py-2">{{ $material->category->name }}</td>
                                <td class="border px-4 py-2">{{ $material->weight }}</td>
                                <td class="border px-4 py-2">{{ $material->value }}</td>
                                <td class="border px-4 py-2">
                                    <a href="#" class=" mr-2 open-edit-modal"
                                        data-id="{{ $material->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este material?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden overflow-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl">
            <div class="p-4 flex justify-between items-center">
                <button id="closeModal"
                    class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Nuevo material</h1>
            </div>

            <div id="modalContent"
                class="flex justify-center items-center bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg relative">

            </div>
        </div>
    </div>

    <div id="editModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden overflow-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl">
            <div class="p-4 flex justify-between items-center">
                <button id="closeEditModal"
                    class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Editar material</h1>
            </div>

            <div id="editModalContent"
                class="flex justify-center items-center bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg relative">

            </div>

        </div>
    </div>



    <script>
        document.getElementById('gridView').addEventListener('click', function() {
            document.getElementById('materialContainer').classList.remove('hidden');
            document.getElementById('materialTable').classList.add('hidden');
        });

        document.getElementById('listView').addEventListener('click', function() {
            document.getElementById('materialContainer').classList.add('hidden');
            document.getElementById('materialTable').classList.remove('hidden');
        });

        document.getElementById('searchMaterial').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const materialItems = document.querySelectorAll('.material-item');
            materialItems.forEach(item => {
                const name = item.querySelector('strong').nextSibling.textContent.toLowerCase();
                if (name.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });



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
                fetch('{{ route('materials.create') }}')
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
                    const materialId = this.getAttribute('data-id');

                    fetch(`{{ url('/materials') }}/${materialId}/edit`)
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

    <script src="{{ asset('js/filename_image.js') }}"></script>



</x-app-layout>
