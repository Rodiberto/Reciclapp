<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center overflow-auto">
        <div class="p-8  bg-white rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">

            <div class="py-4 flex justify-between items-center">
                <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">Nuevo usuario</h1>
            </div>

            <div class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg relative">

                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data"
                    class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @csrf

                    <div class="">
                        <label for="name" class="block text-gray-700">Nombre completo</label>
                        <input id="name" type="text"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700 "
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span id="name-error" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="">
                        <label for="email" class="block text-gray-700">Correo electrónico</label>
                        <input id="email" type="email"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700 "
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        <span id="email-error" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="mb-2 relative">
                        <label for="password" class="block text-gray-700 mb-1">Contraseña</label>
                        <input id="password" type="password"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="password" required autocomplete="new-password">

                        <button type="button" id="toggle-password"
                            class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                            <i class="fa fa-eye" id="eye-icon-password"></i>
                            <i class="fa fa-eye-slash hidden" id="eye-slash-icon-password"></i>
                        </button>
                        <span id="password-error" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="mb-2 relative">
                        <label for="password_confirmation" class="block text-gray-700 mb-1">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700 "
                            name="password_confirmation" required autocomplete="new-password">

                        <button type="button" id="toggle-password-confirmation"
                            class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                            <i class="fa fa-eye" id="eye-icon-password-confirmation"></i>
                            <i class="fa fa-eye-slash hidden" id="eye-slash-icon-password-confirmation"></i>
                        </button>
                        <span id="password_confirmation-error" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="mb-2">
                        <label for="phone" class="block text-gray-700">Teléfono</label>
                        <input id="phone" type="text"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700"
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        <span id="phone-error" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="mb-2">
                        <label for="rol_id" class="block text-gray-700">Rol</label>
                        <select id="rol_id"
                            class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight focus:ring-green-700 focus:border-green-700 "
                            name="rol_id" required>
                            <option value="">Selecciona rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('rol_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-2">
                        <label for="photo" class="block text-gray-700 font-medium">Imagen</label>
                        <input type="file" id="photo" name="photo" class="hidden" accept="image/*"
                            onchange="updateFileName()">
                        <label for="photo"
                            class="block cursor-pointer p-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 w-full sm:text-sm">
                            <span class="truncate py-4">Seleccionar archivo</span>
                        </label>
                        <span id="file-name-users"></span>
                    </div>

                    <div class="mb-2 sm:col-span-2">
                        <button type="submit"
                            class="w-full bg-green-800 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:bg-green-700">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/filename_users.js') }}"></script>
    <script src="{{ asset('js/t-register.js') }}"></script>
    <script src="{{ asset('js/password-register.js') }}"></script>


</x-app-layout>
