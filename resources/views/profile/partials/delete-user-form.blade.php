<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Borrar cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una vez que se haya eliminado su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de borrar su cuenta, por favor descargue cualquier dato o información que desee conservar.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Borrar cuenta') }}</x-danger-button>


    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una vez que se haya eliminado su cuenta, todos sus recursos y datos se eliminarán permanentemente. Por favor, ingrese su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}
            </p>

            <div class="mt-6 relative">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full pr-10"
                    placeholder="{{ __('Contraseña') }}" />

                <button type="button" id="toggle-delete-password"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-green-800">
                    <i class="fa fa-eye" id="eye-icon-delete"></i>
                    <i class="fa fa-eye-slash hidden" id="eye-slash-icon-delete"></i>
                </button>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Borrar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

<script src="{{ asset('js/password-delete.js') }}"></script>

