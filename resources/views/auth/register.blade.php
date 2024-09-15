<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reciclapp') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/bg_custom.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen py-4 px-4">
        <div id="custom-bg" class="p-6 flex flex-col max-w-3xl w-full rounded-lg shadow-lg overflow-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 mb-1">
                <div class="bg-custom overflow-hidden flex justify-center items-center">
                    <div class="p-6 text-gray-900">
                        <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" class="mx-auto" width="150px"
                            height="150px">
                    </div>
                </div>
                <div class="bg-white overflow-hidden p-4">
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
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone')" required autofocus autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo electrónico')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4 relative">
                            <x-input-label for="password" :value="__('Contraseña')" />
                            <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password"
                                required autocomplete="new-password" />
                            <button type="button" id="toggle-password"
                                class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                                <i class="fa fa-eye" id="eye-icon-password"></i>
                                <i class="fa fa-eye-slash hidden" id="eye-slash-icon-password"></i>
                            </button>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4 relative">
                            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                            <button type="button" id="toggle-password-confirmation"
                                class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                                <i class="fa fa-eye" id="eye-icon-confirmation"></i>
                                <i class="fa fa-eye-slash hidden" id="eye-slash-icon-confirmation"></i>
                            </button>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>


                        {{-- <div class="mt-4">
                            <x-input-label for="photo" :value="__('Foto de perfil')" />
                            <div class="mt-1 flex items-center">
                                <label for="photo"
                                    class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 w-full sm:text-sm">
                                    <span class="block truncate">Seleccionar archivo (opcional)</span>
                                    <input id="photo" type="file" name="photo" class="hidden">
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>
                        <span id="file-name"></span> --}}
                        <div class="flex items-center justify-end mt-4">
                            <a class="px-2 flex-start text-sm text-gray-600 hover:text-gray-900"
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
    <script src="{{ asset('js/password-register.js') }}"></script>

</body>



