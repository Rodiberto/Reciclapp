<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reciclapp') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bg_custom.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex items-center justify-center h-screen">

        <div id="custom-bg" class="p-6 flex flex-col max-w-3xl w-full dark:bg-gray-900 rounded-lg shadow-lg">

            <div class="grid grid-cols-1 md:grid-cols-2 mb-1">

                <div class="bg-custom dark:bg-gray-800 overflow-hidden flex justify-center items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" class="mx-auto" width="150px"
                            height="150px">
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden p-4">
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nombre completo')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Teléfono')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone"
                                :value="old('phone')" required autofocus autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo electrónico')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="profile_photo_path" :value="__('Foto de perfil')" />
                            <div class="mt-1 flex items-center">
                                <label for="profile_photo_path"
                                    class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:text-sm">
                                    <span class="block truncate">Seleccionar archivo (opcional)</span>
                                    <input id="profile_photo_path" type="file" name="profile_photo_path"
                                        class="hidden">
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('profile_photo_path')" class="mt-2" />
                        </div>
                        <span id="file-name"></span>

                        <div class="flex items-center justify-end mt-4">
                            <a class="px-2 flex-start text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('login') }}">
                                {{ __('¿Ya estás registrado?') }}
                            </a>
                            <x-login-button>
                                {{ __('Registrarse') }}
                            </x-login-button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('js/filename.js') }}"></script>

</body>
