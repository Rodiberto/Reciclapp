<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-lg h-auto max-h-screen overflow-auto">

    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data"
        class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <div class="col-span-1">
            <label for="name" class="block text-gray-700 dark:text-gray-300">Nombre completo</label>
            <input id="name" type="text"
                class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('name') border-red-500 @enderror"
                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="email" class="block text-gray-700 dark:text-gray-300">Correo electrónico</label>
            <input id="email" type="email"
                class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('email') border-red-500 @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="password" class="block text-gray-700 dark:text-gray-300">Contraseña</label>
            <input id="password" type="password"
                class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('password') border-red-500 @enderror"
                name="password" required autocomplete="new-password">
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirmar
                contraseña</label>
            <input id="password_confirmation" type="password"
                class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight"
                name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="col-span-1">
            <label for="phone" class="block text-gray-700 dark:text-gray-300">Teléfono</label>
            <input id="phone" type="number"
                class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('phone') border-red-500 @enderror"
                name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
            @error('phone')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-span-1">
            <label for="rol_id" class="block text-gray-700 dark:text-gray-300">Rol</label>
            <select id="rol_id"
                class="block w-full text-gray-700 border rounded-lg py-2 px-4 leading-tight @error('rol_id') border-red-500 @enderror"
                name="rol_id" required>
                <option value="">Selecciona rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('rol_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->nombre }}</option>
                @endforeach
            </select>
            @error('rol_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="profile_photo_path" class="block text-gray-700 dark:text-gray-300 font-medium">Imagen</label>
            <input type="file" id="profile_photo_path" name="profile_photo_path" class="hidden"
                onchange="updateFileName()">

            <label for="profile_photo_path"
                class="block cursor-pointer p-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:text-sm">
                <span class="truncate py-4">Seleccionar archivo</span>
            </label>

            <x-input-error :messages="$errors->get('profile_photo_path')" class="mt-2" />
            <span id="file-name-users"></span>
        </div>

        <div class="col-span-2">
            <button type="submit"
            class="w-full bg-green-800 dark:bg-green-200 text-white dark:text-white 
            font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
            focus:ring-2 focus:bg-green-700 dark:focus:bg-white">
            Guardar
        </button>
        </div>

    </form>
</div>
