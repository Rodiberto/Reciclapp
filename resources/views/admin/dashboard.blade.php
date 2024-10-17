<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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



            <div class="py-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Usuarios
                            registrados</p>
                        <div class="chart-container">
                            <canvas id="userRolesChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">

                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Materiales
                            reciclados</p>
                        <div class="chart-container">
                            <canvas id="totalMaterialsChart" height="270px"></canvas>
                        </div>
                    </div>

                </div>


                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Materiales por
                            recolector</p>
                        <select id="userSelect"
                            class="w-full md:w-full border border-transparent rounded focus:ring-green-700 focus:border-green-700">
                            @foreach ($userMaterialsData->groupBy('user_name') as $userName => $userData)
                                <option value="{{ $userData->first()->user_id }}">{{ $userName }}</option>
                            @endforeach
                        </select>
                        <div class="chart-container ">
                            <canvas id="userMaterialsChart" height="270px"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>




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


    <script>
        var totalMaterialsCtx = document.getElementById('totalMaterialsChart').getContext('2d');
        var totalMaterialsChart = new Chart(totalMaterialsCtx, {
            type: 'bar',
            data: {
                labels: @json($totalMaterialsData->pluck('material_type')),
                datasets: [{
                    label: 'Cantidad total reciclada (kg)',
                    data: @json($totalMaterialsData->pluck('total_amount')),
                    backgroundColor: [
                        '#33FF57',
                        '#FF5733',
                        '#3357FF',
                        '#F1C40F',
                        '#E74C3C',
                        '#FF5733',
                        '#33FF57',
                        '#3357FF'
                    ],
                    borderColor: '#000000',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad reciclada (kg)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

    <script>
        document.getElementById('userSelect').addEventListener('change', function() {
            var userId = this.value;
            var userMaterialsData = @json($userMaterialsData->groupBy('user_id'));

            var selectedUserData = userMaterialsData[userId] || [];
            var ctx = document.getElementById('userMaterialsChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: selectedUserData.map(item => 'Bolsa ' + item.bag_id),
                    datasets: [{

                        data: selectedUserData.map(item => item.total_amount),
                        backgroundColor: [
                            '#33FF57',
                            '#FF5733',
                            '#3357FF',
                            '#F1C40F',
                            '#E74C3C',
                            '#FF5733',
                            '#33FF57',
                            '#3357FF'
                        ].slice(0, selectedUserData.length),
                        borderColor: '#000000',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Cantidad recolectada (kg) por recolector'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
        document.getElementById('userSelect').dispatchEvent(new Event('change'));
    </script>













    {{-- estaticos --}}

    {{-- <script>
        document.getElementById('userSelect').addEventListener('change', function() {
            var ctx = document.getElementById('userMaterialsChart').getContext('2d');

            var selectedUserData = [{
                    bag_id: 1,
                    total_amount: 30
                },
                {
                    bag_id: 2,
                    total_amount: 45
                },
                {
                    bag_id: 3,
                    total_amount: 25
                },
                {
                    bag_id: 4,
                    total_amount: 60
                }
            ];

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: selectedUserData.map(item => 'Bolsa ' + item.bag_id),
                    datasets: [{
                        label: 'Cantidad recolectada (kg)',
                        data: selectedUserData.map(item => item.total_amount),
                        backgroundColor: [
                            '#33FF57',
                            '#FF5733',
                            '#3357FF',
                            '#F1C40F',
                            '#E74C3C',
                        ],
                        borderColor: '#000000',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        document.getElementById('userSelect').dispatchEvent(new Event('change'));
    </script>

    <script>
        var totalMaterialsCtx = document.getElementById('totalMaterialsChart').getContext('2d');
        var totalMaterialsChart = new Chart(totalMaterialsCtx, {
            type: 'bar',
            data: {
                labels: ['Plástico', 'Cartón', 'Vidrio', 'Metal', 'Papel'],
                datasets: [{
                    label: 'Cantidad total reciclada (kg)',
                    data: [40, 50, 20, 30, 15],
                    backgroundColor: [
                        '#33FF57',
                        '#FF5733',
                        '#3357FF',
                        '#F1C40F',
                        '#E74C3C',
                    ],
                    borderColor: '#000000',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}





</x-app-layout>
