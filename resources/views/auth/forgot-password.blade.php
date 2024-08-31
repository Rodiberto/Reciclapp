<x-guest-layout>

    <h1 class="text-center text-2xl font-bold text-gray-800 mt-4 mb-4">RECICLAPP</h1>
    <div class="p-6 text-gray-900">

        <img src="{{ asset('/img/logo2.png') }}" alt="Logo Reciclapp" class="mx-auto" width="100px" height="100px">

    </div>

    <div class="mb-4 text-sm text-black">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente déjanos saber tu dirección de correo electrónico y te enviaremos un enlace para restablecer la contraseña que te permitirá elegir una nueva. ') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="flex items-center justify-between">

            <div class="flex items-center justify-start mt-4">
                <x-primary-button>
                    {{ __('Enviar enlace') }}
                </x-primary-button>
            </div>
            <div class="flex items-center justify-start mt-4">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-800
            border border-transparent rounded-md font-semibold text-xs text-white 
            uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 
            focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Regresar') }}
                </a>
            </div>

        </div>



    </form>
</x-guest-layout>
