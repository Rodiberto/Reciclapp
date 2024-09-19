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

    @if (session()->has('error'))
        <div id="message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4"
            role="alert">
            <span class="block sm:inline">{{ session()->get('error') }}</span>
        </div>
    @endif

    @if (session()->has('status'))
        <div id="message" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mt-4"
            role="alert">
            <span class="block sm:inline">{{ session()->get('status') }}</span>
        </div>
    @endif

    <div class="p-2 flex h-screen">

        <div class="flex-1 bg-gray-100">

            <div class="flex flex-wrap justify-between mb-4 text-black">
                <div class="flex space-x-4 py-1">
                    <button id="gridView" class="text-black ml-2">
                        <i class="fas fa-th"></i>
                    </button>

                    <button id="listView" class="text-black mr-2">
                        <i class="fas fa-list"></i>
                    </button>

                    {{-- <a href="{{ route('generate.report') }}" target="_blank"
                        class="text-black  inline-flex items-center py-1">
                        <i class="fas fa-file-pdf mr-2 text-red-700 "></i>
                    </a> --}}


                    <a href="{{ route('materials.create') }}" class="text-black  inline-flex items-center py-1">
                        <i class="fas fa-plus-circle"></i>
                    </a>

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



            <div id="materialContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($materials as $material)
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg material-item">
                        <div class="p-6 text-gray-900">
                            <div class="flex justify-center mb-4">
                                <img src="{{ $material->image }}" alt="Imagen del material"
                                    class="w-20 h-20 rounded-full">
                            </div>
                            <p class="flex justify-center"><strong class="px-2">Nombre:</strong>
                                {{ $material->name }}
                            </p>
                            <p class="flex justify-center"><strong class="px-2">Descripción</strong>
                            </p>
                            <p class="flex text-justify">{{ $material->description }}</p>

                            <p class="flex justify-center"><strong class="px-2">Categoría:</strong>
                                {{ $material->category->name }}
                            </p>
                            <p class="flex justify-center"><strong class="px-2">Peso:</strong>
                                {{ $material->weight }}</p>
                            <p class="flex justify-center"><strong class="px-2">Valor:</strong>
                                {{ $material->value }}</p>
                            <div class="mt-4">
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
                            </div>
                        </div>
                    </div>
                @endforeach
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
                        @endforeach
                    </tbody>
                </table>
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
    </script>


</x-app-layout>
