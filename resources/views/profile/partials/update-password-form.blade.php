<section>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        
    </head>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Asegúrate de que tu cuenta esté utilizando una contraseña larga y aleatoria para mantenerla segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="relative mt-4">
            <x-input-label for="update_password_current_password" :value="__('Contraseña actual')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="block mt-1 w-full pr-10" autocomplete="current-password" />
            <button type="button" id="toggle-current-password"
                class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                <i class="fa fa-eye" id="eye-icon-current"></i>
                <i class="fa fa-eye-slash hidden" id="eye-slash-icon-current"></i>
            </button>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="relative mt-4">
            <x-input-label for="update_password_password" :value="__('Nueva contraseña')" />
            <x-text-input id="update_password_password" name="password" type="password" class="block mt-1 w-full pr-10"
                autocomplete="new-password" />
            <button type="button" id="toggle-new-password"
                class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                <i class="fa fa-eye" id="eye-icon-new"></i>
                <i class="fa fa-eye-slash hidden" id="eye-slash-icon-new"></i>
            </button>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="relative mt-4">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="block mt-1 w-full pr-10" autocomplete="new-password" />
            <button type="button" id="toggle-confirm-password"
                class="absolute mt-4 inset-y-0 right-0 pr-3 flex items-center text-green-800">
                <i class="fa fa-eye" id="eye-icon-confirm-confirmation"></i>
                <i class="fa fa-eye-slash hidden" id="eye-slash-icon-confirm-confirmation"></i>
            </button>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="inline-flex bg-green-800 text-white 
            font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none 
            focus:ring-2 focus:bg-green-700">
                Guardar
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>

<script src="{{ asset('js/password-update-information.js') }}"></script>
