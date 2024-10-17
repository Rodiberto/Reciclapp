<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <canvas id="userRolesChart"></canvas>
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
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                },
            };

            const userRolesChart = new Chart(ctx, config);
        });
    </script>

</x-app-layout>
