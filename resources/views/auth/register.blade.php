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
                <div class="bg-white overflow-hidden p-4">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Nombre completo')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <span id="name-error" class="text-red-500 text-xs"></span>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Teléfono')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone')" required autofocus autocomplete="phone" inputmode="numeric"
                                maxlength="10" />
                            <span id="phone-error" class="text-red-500 text-xs"></span>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo electrónico')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <span id="email-error" class="text-red-500 text-xs"></span>
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
                            <span id="password-error" class="text-red-500 text-xs"></span>
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
                            <span id="password_confirmation-error" class="text-red-500 text-xs"></span>
                        </div>

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
    <script src="{{ asset('js/password-register.js') }}"></script>
    <script src="{{ asset('js/t-register.js') }}"></script>


</body>
