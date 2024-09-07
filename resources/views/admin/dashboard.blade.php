<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="flex h-screen">
        <div class="p-2 flex-1 bg-gray-100">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mb-6">

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Usuarios
                            recolectores</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($users as $user)
                                <a
                                    href="{{ route('users.index', $user->id) }}"class="flex flex-col items-center bg-gray-50 rounded-lg p-4 hover:bg-gray-100">
                                    <div class="flex flex-col items-center rounded-lg p-4">
                                        <div class="flex justify-center mb-4">
                                            <img src="{{ $user->photo }}" alt="Foto de perfil"
                                                class="w-16 h-16 rounded-full">
                                        </div>
                                        <div class="text-center text-sm">
                                            <p class="font-bold">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Materiales
                            reciclables</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @if ($materials->isEmpty())
                                <div class="flex items-center justify-center col-span-3 text-center">
                                    <p class="text-sm font-semibold text-gray-800">No hay ningún material registrado.
                                    </p>
                                </div>
                            @else
                                @foreach ($materials as $material)
                                    <a
                                        href="{{ route('materials.index', $material->id) }}"class="flex flex-col items-center bg-gray-50 rounded-lg p-4 hover:bg-gray-100">

                                        <div class="flex flex-col items-center rounded-lg p-4">
                                            <div class="flex justify-center mb-4">
                                                <img src="{{ $material->image }}" alt="Imagen del material"
                                                    class="w-20 h-20 rounded-full">
                                            </div>
                                            <div class="text-center text-sm">
                                                <p class="font-bold">{{ $material->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{-- <h2 class="flex justify-center items-center text-xl font-semibold text-gray-800">Usuarios</h2>
                        <div class="chart-container">
                            <canvas id="userRolesChart" width="200" height="200"></canvas>
                        </div> --}}
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-justify">

                    </div>
                </div>
            </div>

            <div class="py-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Usuarios</p>
                        <div class="chart-container">
                            <canvas id="userRolesChart" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('userRolesChart').getContext('2d');
            const data = {
                labels: @json($rolesData->pluck('role_name')),
                datasets: [{
                    label: 'Usuarios por Rol',
                    data: @json($rolesData->pluck('total')),
                    backgroundColor: [
                        '#FF5733',
                        '#33FF57',
                        '#3357FF'
                    ],
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 20,
                            }
                        },
                    }
                },
            };

            const userRolesChart = new Chart(ctx, config);
        });
    </script>
</x-app-layout>
