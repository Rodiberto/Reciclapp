<x-app-layout>

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
    
    
    

</x-app-layout>
