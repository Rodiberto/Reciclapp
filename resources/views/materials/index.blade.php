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

    <div class="p-2 flex h-screen">
        <div class="flex-1 bg-gray-100">
            <div class="flex flex-wrap justify-between mb-4 text-black">

                <div class="flex space-x-2">
                    <div class="flex space-x-2">
                        <button id="toggleView" class="text-black" title="Vista lista/tarjeta">
                            <i id="viewIcon" class="fas"></i>
                        </button>
                    </div>
                    <a href="{{ route('materials.create') }}" class="text-black  inline-flex items-center"
                        title="Añadir nuevo material">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>

                <div class="flex items-center justify-center">
                    <h1 class="text-lg font-extrabold text-gray-900 text-center">
                        Materiales registrados
                    </h1>
                </div>

                <div class="flex space-x-2">
                    <div>
                        <input type="text" placeholder="Buscar material..."
                            class="border border-transparent rounded px-2 py-1 focus:ring-green-700 focus:border-green-700"
                            id="searchMaterial">
                    </div>
                    <div>
                        <form method="GET" action="{{ route('materials.index') }}" class="inline-block">
                            <select name="category" onchange="this.form.submit()"
                                class="px-8 py-1 border border-transparent rounded focus:ring-green-700 focus:border-green-700">
                                <option value="">Categorías</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <div id="materialContainer" class="py-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                @forelse ($materials as $material)
                    <div
                        class="bg-white overflow-hidden shadow-lg sm:rounded-lg material-item flex flex-col justify-between h-full">
                        <div class="p-4 text-gray-900 flex-1">
                            <div class="flex justify-center mb-3">
                                <img src="{{ $material->image }}" alt="Imagen del material"
                                    class="w-20 h-20 rounded-full">
                            </div>
                            <p class="text-sm text-center"><strong>Nombre:</strong> {{ $material->name }}</p>
                            <p class="text-sm text-center"><strong>Descripción:</strong></p>
                            <p class="flex text-justify">{{ $material->description }}</p>
                            <p class="text-sm text-center"><strong>Categoría:</strong> {{ $material->category->name }}
                            </p>
                            <p class="text-sm text-center"><strong>Peso:</strong> {{ $material->weight }}</p>
                            <p class="text-sm text-center"><strong>Valor:</strong> {{ $material->value }}</p>
                        </div>
                        <div class="text-center p-2">
                            <a href="{{ route('materials.edit', $material->id) }}" class="mr-2 text-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('materials.destroy', $material->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este material?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        <p>No hay materiales disponibles.</p>
                    </div>
                @endforelse
            </div>

            <div id="materialTable" class="hidden">
                <table class="table-auto w-full mt-4 bg-white text-gray-900">
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
                        @forelse ($materials as $material)
                            <tr>
                                <td class="border px-4 py-2">{{ $material->name }}</td>
                                <td class="border px-4 py-2"><img src="{{ $material->image }}"
                                        alt="Imagen del material" class="w-10 h-10"></td>
                                <td class="border px-4 py-2">{{ $material->description }}</td>
                                <td class="border px-4 py-2">{{ $material->category->name }}</td>
                                <td class="border px-4 py-2">{{ $material->weight }}</td>
                                <td class="border px-4 py-2">{{ $material->value }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('materials.edit', $material->id) }}" class="mr-2">
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
                        @empty
                            <div class="col-span-full text-center text-gray-500">
                                <p>No hay materiales disponibles.</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleViewButton = document.getElementById('toggleView');
            const viewIcon = document.getElementById('viewIcon');
            const materialContainer = document.getElementById('materialContainer');
            const materialTable = document.getElementById('materialTable');

            let isGridView = true;

            function updateIcon() {
                if (isGridView) {
                    viewIcon.classList.remove('fa-list');
                    viewIcon.classList.add('fa-th');
                } else {
                    viewIcon.classList.remove('fa-th');
                    viewIcon.classList.add('fa-list');
                }
            }

            toggleViewButton.addEventListener('click', function() {
                if (isGridView) {
                    materialContainer.classList.add('hidden');
                    materialTable.classList.remove('hidden');
                } else {
                    materialContainer.classList.remove('hidden');
                    materialTable.classList.add('hidden');
                }

                isGridView = !isGridView;

                updateIcon();
            });

            updateIcon();
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
            const modal = document.getElementById('messageModal');
            if (modal) {
                setTimeout(function() {
                    modal.style.display = 'none';
                }, 3000);
            }
        });
    </script>


</x-app-layout>
