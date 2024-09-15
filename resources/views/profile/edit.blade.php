<x-app-layout>

    @if (session()->has('success'))
        <div id="message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
            role="alert">
            <span class="block sm:inline">{{ session()->get('success') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div id="message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4"
            role="alert">
            <span class="block sm:inline">{{ session()->get('error') }}</span>
        </div>
    @endif

    @if (session()->has('status'))
        <div id="message" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mt-4"
            role="alert">
            <span class="block sm:inline">{{ session()->get('status') }}</span>
        </div>
    @endif


    <div class=" flex h-screen">
        <div class="flex-1 bg-gray-100">
            <div class="p-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mb-6">


                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg flex flex-col">
                    <div class="p-6 text-gray-900 flex-1">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="flex flex-col space-y-6">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-70">
                        <div class="p-6 text-gray-900">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-30">
                        <div class="p-6 text-gray-900">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('fade-out');
                    setTimeout(() => {
                        successMessage.remove();
                    }, 1000);
                }, 2000);
            }
        });
    </script>


</x-app-layout>
