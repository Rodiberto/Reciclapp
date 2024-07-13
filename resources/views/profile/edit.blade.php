<x-app-layout>

    <style>
        #contenido {
            padding: 5px 30px 0px 30px;
        }
    </style>

    <div class="py-4 flex h-screen">
        <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8" id="contenido">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mb-6">
                

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg flex flex-col">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex-1">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
                
                <div class="flex flex-col space-y-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg h-70">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
    
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg h-30">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    

</x-app-layout>
