<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    @if (session()->has('success'))
        <div id="messageModal" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 text-center max-w-sm w-full">
                @if (session()->has('success'))
                    <div class="text-green-700 bg-white border-l-4 border-green-500 p-3 rounded-lg">
                        <strong>Éxito:</strong> {{ session()->get('success') }}
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

                    <a href="{{ route('report.users') }}" target="_blank" class="text-black inline-flex items-center"
                        title="Generar reporte en PDF">
                        <i class="fas fa-file-pdf text-red-700 "></i>
                    </a>

                    <a href="{{ route('users.create') }}" class="text-black  inline-flex items-center"
                        title="Añadir nuevo usuario">
                        <i class="fas fa-plus-circle"></i>
                    </a>

                </div>

                <div class="flex items-center justify-center">
                    <h1 class="text-lg font-extrabold text-gray-900 text-center">
                        Usuarios registrados
                    </h1>
                </div>

                <div class="flex space-x-2">
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
                                <option value="collector" {{ request('role') === 'collector' ? 'selected' : '' }}>
                                    Recolector
                                </option>
                                <option value="standard_user"
                                    {{ request('role') === 'standard_user' ? 'selected' : '' }}>
                                    Usuario estándar</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <div id="userContainer" class="py-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                @foreach ($users as $user)
                    <div
                        class="bg-white overflow-hidden shadow-lg sm:rounded-lg user-item flex flex-col justify-between h-full">
                        <div class="p-4 text-gray-900 flex-1">
                            <div class="flex justify-center mb-3">
                                <img src="{{ $user->photo }}" alt="Foto de perfil" class="w-16 h-16 rounded-full">
                            </div>

                            <p class="text-sm text-center"><strong>Nombre:</strong> {{ $user->name }}</p>
                            <p class="text-sm text-center"><strong>Teléfono:</strong> {{ $user->phone }}</p>
                            <p class="text-sm text-center"><strong>Rol:</strong> {{ $user->role->name }}</p>
                            <p class="text-sm text-center"><strong>Correo:</strong> {{ $user->email }}</p>
                        </div>

                        <div class="text-center p-2">
                            <a href="{{ route('users.edit', $user->id) }}" class="mr-2 text-sm"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar a {{ $user->name }}?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
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
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario {{ $user->name }}?');">
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

            <div class="mt-4">
                {{ $users->links() }}
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleViewButton = document.getElementById('toggleView');
            const viewIcon = document.getElementById('viewIcon');
            const userContainer = document.getElementById('userContainer');
            const userTable = document.getElementById('userTable');

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
                    userContainer.classList.add('hidden');
                    userTable.classList.remove('hidden');
                } else {
                    userContainer.classList.remove('hidden');
                    userTable.classList.add('hidden');
                }
                isGridView = !isGridView;
                updateIcon();
            });
            updateIcon();
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
            const modal = document.getElementById('messageModal');
            if (modal) {
                setTimeout(function() {
                    modal.style.display = 'none';
                }, 3000);
            }
        });
    </script>

</x-app-layout>
