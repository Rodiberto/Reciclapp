<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<style>
    body {
        background-color: #104B28 !important;
    }

    .div-custom {
        background-color: #104B28;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        opacity: 0.8;
    }

    @media (prefers-color-scheme: dark) {
        #div1 {
            background-color: #111827;
            color: #ffffff;
        }
    }
</style>

<body style="font-family: 'Nunito', sans-serif;">

    <div class="py-2">



        <div class="container mx-auto py-6 max-w-5xl">

            <div>


                <div class="flex justify-center items-center h-screen div-custom" id="div1">


                    <div class="w-1/2">
                        <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" class="mx-auto my-auto"
                            width="400px" height="400px">
                    </div>





                    <div class="w-1/2">
                        <x-auth>

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <h1 class="text-center text-4xl font-bold text-gray-800 mt-8 mb-6">BIENVENIDO</h1>

                                <div class="mb-4">
                                    <x-input-label for="email" :value="__('Correo electrónico')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <x-input-label for="password" :value="__('Contraseña')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="current-password" />
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

                        </x-auth>
                    </div>

                </div>


            </div>

    </div>

</body>
