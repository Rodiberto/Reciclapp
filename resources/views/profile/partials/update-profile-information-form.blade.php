<section>

            <head>
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            </head>
        

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información de perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
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
            @if ($user->photo)
                <img src="{{ asset($user->photo) }}" alt="Foto de Perfil" class="rounded-full h-20 w-20 object-cover">
            @else
                <span class="rounded-full h-20 w-20 bg-gray-300 flex items-center justify-center text-gray-600">
                    {{ __('Sin foto') }}
                </span>
            @endif
        </div>
        
        <div class="mt-4">
            <x-input-label for="photo" :value="__('Foto de perfil')" />
            <input type="file" id="photo" name="photo" class="hidden">
        
            <label for="photo" class="block cursor-pointer bg-white py-2  px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-green-700 w-full sm:text-sm">
                <span class="truncate py-4">Seleccionar archivo</span>
            </label>
        
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
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
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Tu dirección de correo electrónico no ha sido verificada.') }}
    
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700">
                            {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                        </button>
                    </p>
    
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
    
        <div class="flex items-center gap-4">
            <button type="submit"
            class="inline-flex bg-green-800 text-white
            font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
            focus:ring-2 focus:bg-green-700">
            Guardar
        </button>
    
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>

    <script src="{{ asset('js/filename.js') }}"></script>
    
</section>
