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

    <div class="p-2 flex h-screen">

        <div class="flex-1 bg-gray-100">

            <div class="flex justify-between mb-4 text-black">
                <div>

                    <button id="gridView" class="px-2 text-black ml-2">
                        <i class="fas fa-th"></i>
                    </button>
                    <button id="listView" class="text-black mr-2">
                        <i class="fas fa-list"></i>
                    </button>

                    <a class="text-black inline-flex items-center px-2 py-1">
                        <i class="fas fa-file-pdf mr-2 text-red-700 "></i>
                    </a>

                    <a href="{{ route('users.create') }}" class="text-black  inline-flex items-center px-2 py-1">
                        <i class="fas fa-plus-circle"></i>
                    </a>

                </div>

                <div>
                    <input type="text" placeholder="Buscar usuario..."
                        class="border border-transparent rounded px-2 py-1 focus:ring-green-700 focus:border-green-700"
                        id="searchUser">
                </div>

                <div>
                    <form method="GET" action="{{ route('users.index') }}" class="inline-block">
                        <select name="role" onchange="this.form.submit()"
                            class="px-2 py-1 border border-transparent rounded focus:ring-green-700 focus:border-green-700">
                            <option value="">Roles</option>
                            <option value="collector" {{ request('role') === 'collector' ? 'selected' : '' }}>Recolector
                            </option>
                            <option value="standard_user" {{ request('role') === 'standard_user' ? 'selected' : '' }}>
                                Usuario estándar</option>
                            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Administrador
                            </option>
                        </select>
                    </form>
                </div>
            </div>


            <div id="userContainer" class="py-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($users as $user)
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg user-item">
                        <div class="p-6 text-gray-900">

                            <div class="flex justify-center mb-4">
                                <img src="{{ $user->photo }}" alt="Foto de perfil" class="w-20 h-20 rounded-full">
                            </div>

                            <p class="flex justify-center"><strong class="px-2">Nombre:</strong></p>
                            <p class="flex justify-center">
                                {{ $user->name }}
                            </p>

                            <p class="flex justify-center"><strong class="px-2">Teléfono:</strong></p>
                            <p class="flex justify-center">
                                {{ $user->phone }}
                            </p>

                            <p class="flex justify-center"><strong class="px-2">Rol:</strong></p>
                            <p class="flex justify-center">
                                {{ $user->role->name }}
                            </p>

                            <p class="flex justify-center"><strong class="px-2">Correo:</strong></p>
                            <p class="flex justify-center">
                                {{ $user->email }}
                            </p>


                            <div class="mt-4">

                                <a href="{{ route('users.edit', $user->id) }}" class="mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display: inline-block;"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario?');">
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


            <div id="userTable" class="hidden">
                <table class="table-auto w-full mt-4 bg-white text-gray-900">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Foto</th>
                            <th class="px-4 py-2">Teléfono</th>
                            <th class="px-4 py-2">Rol</th>
                            <th class="px-4 py-2">Correo</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ $user->photo }}" alt="Foto de perfil" class="w-10 h-10">
                                </td>
                                <td class="border px-4 py-2">{{ $user->phone }}</td>
                                <td class="border px-4 py-2">{{ $user->role->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">

                                    <a href="{{ route('users.edit', $user->id) }}" class="mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario?');">
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
