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

                <div class="bg-white dark:bg-gray-800 overflow-hidden">

                    <h1 class="text-center text-2xl font-bold text-gray-800 mt-4 mb-4">BIENVENIDO</h1>

                    <div class="p-6 text-gray-900 dark:text-gray-100 text-justify">

                        <form method="POST" action="{{ route('login') }}">

                            @csrf

                            <div class="mb-4">

                                <x-input-label for="email" :value="__('Correo electrónico')" />

                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>

                            <div class="mb-4">

                                <x-input-label for="password" :value="__('Contraseña')" />

                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>

                            <x-login-button>

                                {{ __('Iniciar sesión') }}

                            </x-login-button>

                            <div class="flex items-center justify-between">

                                <div class="mb-4 py-2">

                                    <label for="remember_me" class="inline-flex items-center">

                                        <input id="remember_me" type="checkbox"
                                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                            name="remember">

                                        <span
                                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>

                                    </label>

                                </div>

                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100"
                                        href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif

                            </div>

                            <div class="mt-4 text-center">

                                <span
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('¿No tienes una cuenta?') }}</span>

                                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-100"
                                    href="{{ route('register') }}">

                                    {{ __('Regístrate aquí') }}

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
