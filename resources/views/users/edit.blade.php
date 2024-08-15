 <head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-lg h-auto max-h-screen overflow-auto">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <div class="mb-4 flex items-center justify-center">
                        <img src="{{ asset($user->profile_photo_path) }}" alt="Foto de Perfil Actual" class="mt-2 w-30 h-20 object-cover">
                    </div>

                    <div class="mb-4">
                        <x-input-label for="profile_photo_path" :value="__('Foto de perfil')" />
                        <input type="file" id="profile_photo_path" name="profile_photo_path" class="hidden" onchange="updateFileName()">
                    
                        <label for="profile_photo_path" class="block cursor-pointer bg-white py-2  px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:text-sm">
                            <span class="truncate py-4">Seleccionar archivo</span>
                        </label>
                    
                        <x-input-error :messages="$errors->get('profile_photo_path')" class="mt-2" />
                            <span id="file-name-users"></span>
                    </div>
                    

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nombre</label>
                        <input id="name" type="text" class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('name') border-red-500 @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                    
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700">Teléfono</label>
                        <input id="phone" type="number" class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('phone') border-red-500 @enderror" name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="phone" autofocus>
                    
                        @error('phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Correo Electrónico</label>
                        <input id="email" type="email" class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('email') border-red-500 @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Nueva Contraseña</label>
                        <input id="password" type="password" class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('password') border-red-500 @enderror" name="password" autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700">Confirmar Nueva Contraseña</label>
                        <input id="password_confirmation" type="password" class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight" name="password_confirmation" autocomplete="new-password">
                    </div>

                    <div class="mb-4">
                        <label for="rol_id" class="block text-gray-700">Rol</label>
                        <select id="rol_id" class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('rol_id') border-red-500 @enderror" name="rol_id" required>
                            <option value="">Seleccionar Rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->rol_id == $role->id ? 'selected' : '' }}>{{ $role->nombre }}</option>
                            @endforeach
                        </select>

                        @error('rol_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-span-2">
                <button type="submit"
                class="w-full bg-green-800 dark:bg-green-200 text-white dark:text-white 
                font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
                focus:ring-2 focus:bg-green-700 dark:focus:bg-white">
                Actualizar
            </button>
            </div>            
        </form>
    </div>

