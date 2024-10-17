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

@if (session('session_expired'))
    <div id="messageModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 text-center max-w-sm w-full">
            @if (session('session_expired'))
                <div class="text-green-700 bg-white border-l-4 border-green-500 p-3 rounded-lg">
                    <strong>Estado:</strong> {{ session()->get('session_expired') }}
                </div>
            @endif

        </div>
    </div>
@endif



<body class="bg-gray-100">

    <div class="flex items-center justify-center h-screen">


        <div id="custom-bg" class="p-6 flex flex-col max-w-3xl w-full rounded-lg shadow-lg">

            <div class=" p-4 flex items-center">
                <a href="javascript:history.back()" class="text-white mr-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 mb-1">


                <div class="bg-custom overflow-hidden flex justify-center items-center">

                    <div class="p-6 text-gray-900">

                        <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" class="mx-auto" width="150px"
                            height="150px">

                    </div>

                </div>

                <div class="bg-white overflow-hidden">


                    <h1 class="text-center text-2xl font-bold text-gray-800 mt-4 mb-4">BIENVENIDO</h1>

                    <div class="p-6 text-gray-900 text-justify">

                        <form method="POST" action="{{ route('login') }}">

                            @csrf

                            <div class="mb-4">

                                <x-input-label for="email" :value="__('Correo electrónico')" />

                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>


                            <div class="mb-4 relative">
                                <x-input-label for="password" :value="__('Contraseña')" />

                                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password"
                                    name="password" required autocomplete="current-password" />

                                <button type="button" id="toggle-login-password"
                                    class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                                    <i class="fa fa-eye" id="eye-icon-login"></i>
                                    <i class="fa fa-eye-slash hidden" id="eye-slash-icon-login"></i>
                                </button>

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>




                            <x-login-button>

                                {{ __('Iniciar sesión') }}

                            </x-login-button>

                            <div class="flex items-center justify-between">

                                <div class="mb-4 py-4">

                                    <label for="remember_me" class="inline-flex items-center">

                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-green-800 shadow-sm focus:ring-green-700 "
                                            name="remember">

                                        <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>

                                    </label>

                                </div>

                                <div class="mb-4 py-4">
                                    @if (Route::has('password.request'))
                                        <a class="text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>



                            </div>

                            <div class="mt-4 text-center">

                                <span class="px-2 text-sm text-gray-600">{{ __('¿No tienes una cuenta?') }}</span>

                                <a class="text-sm text-indigo-600 hover:text-indigo-900 "
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('messageModal');
            if (modal) {
                setTimeout(function() {
                    modal.style.display = 'none';
                }, 3000);
            }
        });
    </script>

</body>
<script src="{{ asset('js/password-login.js') }}"></script>
