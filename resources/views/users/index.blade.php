<x-app-layout>

    <style>
        #contenido {
            padding: 0px 10px 0px 10px;
        }
    </style>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session()->get('success') }}</span>
        </div>
    @endif


    {{-- <x-slot name="header">
<p>hola</p>
    </x-slot> --}}



    <div class="py-4 flex h-screen">
        <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8" id="contenido">

            <div class="flex justify-between mb-4 text-black dark:bg-gray-800 dark:text-white">
                <div>

                    <button id="gridView" class="text-black dark:bg-gray-800 dark:text-white ml-2">
                        <i class="fas fa-th"></i>
                    </button>
                    <button id="listView" class="text-black dark:bg-gray-800 dark:text-white mr-2">
                        <i class="fas fa-list"></i>
                    </button>
                </div>

                <div class="bg-white dark:bg-gray-800">
                    <a href="{{ route('users.create') }}" class="text-black dark:bg-gray-800 dark:text-white">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </div>

                <div>
                    <input type="text" placeholder="Buscar usuario..."
                        class="border rounded px-2 py-1 dark:border-gray-600 dark:bg-white dark:text-black"
                        id="searchUser">
                </div>

                <div>
                    <form method="GET" action="{{ route('users.index') }}" class="inline-block">
                        <select name="role" onchange="this.form.submit()"
                            class="p-2 border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                            <option value="">Filtrar por rol</option>
                            <option value="collector" {{ request('role') === 'collector' ? 'selected' : '' }}>Recolector
                            </option>
                            <option value="standard_user" {{ request('role') === 'standard_user' ? 'selected' : '' }}>
                                Usuario Estandar</option>
                            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Administrador
                            </option>
                        </select>
                    </form>
                </div>
            </div>





            <div id="userContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($users as $user)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg user-item">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex justify-center mb-4">
                                <img src="{{ $user->profile_photo_path }}" alt="Foto de perfil"
                                    class="w-20 h-20 rounded-full">
                            </div>
                            <p class="flex justify-center"><strong>Nombre:</strong> {{ $user->name }}</p>
                            <p class="flex justify-center"><strong>Rol:</strong> {{ $user->role->nombre }}</p>
                            <p class="flex justify-center"><strong>Correo:</strong> {{ $user->email }}</p>
                            <div class="mt-4">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-yellow-500 hover:text-yellow-600 mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display: inline-block;"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div id="userTable" class="hidden">
                <table class="table-auto w-full mt-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Rol</th>
                            <th class="px-4 py-2">Correo</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->role->nombre }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="text-yellow-500 hover:text-yellow-600 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600">
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
            document.getElementById('userContainer').classList.remove('hidden');
            document.getElementById('userTable').classList.add('hidden');
        });

        document.getElementById('listView').addEventListener('click', function() {
            document.getElementById('userContainer').classList.add('hidden');
            document.getElementById('userTable').classList.remove('hidden');
        });

        document.getElementById('searchUser').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const userItems = document.querySelectorAll('.user-item');
            userItems.forEach(item => {
                const name = item.querySelector('strong').nextSibling.textContent.toLowerCase();
                if (name.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>

</x-app-layout>
