<section>

            <head>
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            </head>
        

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Información de perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
    
        <div class="mt-4 flex justify-center items-cente relative">
            @if ($user->profile_photo_path)
                <img src="{{ asset($user->profile_photo_path) }}" alt="Foto de Perfil" class="rounded-full h-20 w-20 object-cover">
            @else
                <span class="rounded-full h-20 w-20 bg-gray-300 flex items-center justify-center text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                    {{ __('Sin foto') }}
                </span>
            @endif
        </div>
        
        <div class="mt-4">
            <x-input-label for="profile_photo_path" :value="__('Foto de perfil')" />
            <input type="file" id="profile_photo_path" name="profile_photo_path" class="hidden">
        
            <label for="profile_photo_path" class="block cursor-pointer bg-white py-2  px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:text-sm">
                <span class="truncate py-4">Seleccionar archivo</span>
            </label>
        
            <x-input-error :messages="$errors->get('profile_photo_path')" class="mt-2" />
        </div>
        <span id="file-name"></span>
        

    
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Teléfono')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
    
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
    
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Tu dirección de correo electrónico no ha sido verificada.') }}
    
                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                        </button>
                    </p>
    
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
    
        <div class="flex items-center gap-4">
            {{-- <x-primary-button>{{ __('Guardar') }}</x-primary-button> --}}
            <button type="submit"
            class="inline-flex bg-green-800 dark:bg-green-200 text-white dark:text-white 
            font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
            focus:ring-2 focus:bg-green-700 dark:focus:bg-white">
            Guardar
        </button>
    
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>

    <script src="{{ asset('js/filename.js') }}"></script>
    
</section>
