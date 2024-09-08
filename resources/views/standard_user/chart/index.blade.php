{{-- <x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    </head>



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6 mb-6">


        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Materiales reciclados</p>
                <form id="intervalForm">
                    <label for="interval">Selecciona el intervalo:</label>
                    <select id="interval" name="interval">
                        <option value="week" {{ $interval === 'week' ? 'selected' : '' }}>Semana</option>
                        <option value="month" {{ $interval === 'month' ? 'selected' : '' }}>Mes</option>
                    </select>
                    <button type="submit">Actualizar</button>
                </form>

                <div>
                    <canvas id="myChart" height="100px" width="100px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.getElementById('intervalForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var interval = document.getElementById('interval').value;
            var url = `{{ route('standard_user.dashboard') }}?interval=${interval}`;
            window.location.href = url;
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: {!! json_encode($materials) !!},
                datasets: [{
                    label: 'Cantidad reciclada (kg)',
                    data: {!! json_encode($quantities) !!}, 
                    backgroundColor: [
                        'rgba(75, 192, 192, 1)', 
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
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
    </script>

</x-app-layout> --}}
