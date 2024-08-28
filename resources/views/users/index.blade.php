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

                    <a class="text-black dark:bg-gray-800 dark:text-white inline-flex items-center px-2 py-1">
                        <i class="fas fa-file-pdf mr-2 text-red-700 "></i>
                    </a>

                    <button id="openModal" class="text-black dark:bg-gray-800 dark:text-white">
                        <i class="fas fa-user-plus"></i>
                        {{-- <span>Nuevo</span> --}}
                    </button>

                </div>

                <div>
                    <input type="text" placeholder="Buscar usuario..."
                        class="border border-transparent rounded px-2 py-1 dark:border-gray-600 dark:bg-white dark:text-black"
                        id="searchUser">
                </div>

                <div>
                    <form method="GET" action="{{ route('users.index') }}" class="inline-block">
                        <select name="role" onchange="this.form.submit()"
                            class="px-2 py-1 border border-transparent rounded dark:border-transparent dark:bg-gray-700 dark:text-gray-200">
                            <option value="">Roles</option>
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
                                <img src="{{ $user->photo }}" alt="Foto de perfil"
                                    class="w-20 h-20 rounded-full">
                            </div>
                            <p class="flex justify-center"><strong class="px-2">Nombre:</strong>{{ $user->name }}
                            </p>
                            <p class="flex justify-center"><strong class="px-2">Teléfono:</strong> {{ $user->phone }}
                            </p>
                            <p class="flex justify-center"><strong class="px-2">Rol:</strong>
                                {{ $user->role->name }}</p>
                            <p class="flex justify-center"><strong class="px-2">Correo:</strong> {{ $user->email }}
                            </p>

                            <div class="mt-4">

                                <a href="#" class=" mr-2 open-edit-modal"
                                    data-id="{{ $user->id }}">
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
                <table class="table-auto w-full mt-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
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
                                    <a href="#" class=" mr-2 open-edit-modal"
                                        data-id="{{ $user->id }}">
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
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Nuevo usuario</h1>
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
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Editar usuario</h1>
            </div>

            <div id="editModalContent"
                class=" flex justify-center items-center bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg relative">

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


            document.getElementById('openModal').addEventListener('click', function() {
                fetch('{{ route('users.create') }}')
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
                    const userId = this.getAttribute('data-id');

                    fetch(`{{ url('/users') }}/${userId}/edit`)
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

    <script src="{{ asset('js/filename_users.js') }}"></script>

</x-app-layout>
