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

    .btn-custm {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        margin: 0px 5px 0px 15px;
        background-color: #104B28;
        border: 1px solid transparent;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #FFFFFF;
        transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, color 0.2s ease-in-out;
        /* Transiciones */
        cursor: pointer;
    }

    .btn-custm:hover {
        background-color: #135c30;
        border-color: #135c30;
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

                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div>
                                    <x-input-label for="name" :value="__('Nombre')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Correo electrónico')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Contraseña')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="new-password" />
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
                                    <a class="flex-start underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('login') }}">
                                        {{ __('¿Ya estás registrado?') }}
                                    </a>

                                    <button class="ms-4 btn-custm">
                                        {{ __('Registrarse') }}
                                    </button>


                                </div>
                            </form>

                        </x-auth>
                    </div>

                </div>


            </div>

        </div>

        <script src="{{ asset('js/filename.js') }}"></script>

</body>
