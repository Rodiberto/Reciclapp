{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Incluye Chart.js -->
</head>
<body>
    <div class="container">
        <h1>Dashboard de Usuario</h1>
        
        <!-- Gráfica -->
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Obtener el contexto del canvas donde se dibujará la gráfica
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfica: bar, line, pie, etc.
            data: {
                labels: {!! json_encode($materials) !!}, // Etiquetas para cada barra (Materiales reciclados)
                datasets: [{
                    label: 'Cantidad reciclada (kg)', // Etiqueta para el gráfico
                    data: {!! json_encode($quantities) !!}, // Cantidades recicladas para cada material
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Color de fondo para cada barra
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Color del borde para cada barra
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
                        beginAtZero: true // Comenzar el eje Y en 0
                    }
                }
            }
        });
    </script>
</body>
</html>  --}}


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Incluye Chart.js -->
</head>
<body>
    <div class="container">
        <h1>Dashboard de Usuario</h1>
        
        <!-- Menú desplegable para seleccionar intervalo de tiempo -->
        <label for="timeRange">Selecciona el intervalo de tiempo:</label>
        <select id="timeRange" onchange="updateChart()">
            <option value="week">Esta Semana</option>
            <option value="month">Este Mes</option>
        </select>
        
        <!-- Gráfica -->
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Datos de ejemplo para la semana y el mes
        var weekData = {
            materials: ['Plástico', 'Cartón', 'Vidrio', 'Aluminio', 'Papel'],
            quantities: [30, 20, 10, 25, 35]
        };

        var monthData = {
            materials: ['Plástico', 'Cartón', 'Vidrio', 'Aluminio', 'Papel'],
            quantities: [120, 80, 45, 60, 90]
        };

        // Función para actualizar la gráfica según el intervalo seleccionado
        function updateChart() {
            var selectedRange = document.getElementById('timeRange').value; // Obtener el valor seleccionado
            var dataToUse = selectedRange === 'week' ? weekData : monthData; // Seleccionar los datos según la opción

            // Actualizar los datos del gráfico
            myChart.data.labels = dataToUse.materials; // Actualizar las etiquetas (materiales)
            myChart.data.datasets[0].data = dataToUse.quantities; // Actualizar las cantidades recicladas
            myChart.update(); // Refrescar el gráfico
        }

        // Inicializar la gráfica con los datos de la semana
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfica
            data: {
                labels: weekData.materials, // Etiquetas iniciales (semana)
                datasets: [{
                    label: 'Cantidad reciclada (kg)',
                    data: weekData.quantities, // Datos iniciales (semana)
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
                        beginAtZero: true // Comenzar el eje Y en 0
                    }
                }
            }
        });
    </script>
</body>
</html> --}}





{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Incluye Chart.js -->
</head>
<body>
    <div class="container">
        <h1>Dashboard de Usuario</h1>
        
        <!-- Selector de intervalo -->
        <form id="intervalForm">
            <label for="interval">Selecciona el intervalo:</label>
            <select id="interval" name="interval">
                <option value="week" {{ $interval === 'week' ? 'selected' : '' }}>Semana</option>
                <option value="month" {{ $interval === 'month' ? 'selected' : '' }}>Mes</option>
            </select>
            <button type="submit">Actualizar</button>
        </form>

        <!-- Gráfica -->
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Obtener el contexto del canvas donde se dibujará la gráfica
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfica: bar, line, pie, etc.
            data: {
                labels: {!! json_encode($materials) !!}, // Etiquetas para cada barra (Materiales reciclados)
                datasets: [{
                    label: 'Cantidad reciclada (kg)', // Etiqueta para el gráfico
                    data: {!! json_encode($quantities) !!}, // Cantidades recicladas para cada material
                    backgroundColor: [
                        'rgba(75, 192, 192, 1)', // Color de fondo sólido para cada barra
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Color del borde sólido para cada barra
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
                        beginAtZero: true // Comenzar el eje Y en 0
                    }
                }
            }
        });

        // Manejar el cambio en el selector de intervalo
        document.getElementById('intervalForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional
            var interval = document.getElementById('interval').value;
            window.location.href = `{{ route('chart.index') }}?interval=${interval}`;
        });
    </script>
</body>
</html> --}}

<x-app-layout>

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
            event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional
            var interval = document.getElementById('interval').value;
            var url = `{{ route('standard_user.dashboard') }}?interval=${interval}`;
            window.location.href = url;
        });

        // Asegúrate de que los datos se inyecten correctamente en el gráfico
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfica: bar, line, pie, etc.
            data: {
                labels: {!! json_encode($materials) !!}, // Etiquetas para cada barra (Materiales reciclados)
                datasets: [{
                    label: 'Cantidad reciclada (kg)', // Etiqueta para el gráfico
                    data: {!! json_encode($quantities) !!}, // Cantidades recicladas para cada material
                    backgroundColor: [
                        'rgba(75, 192, 192, 1)', // Color de fondo sólido para cada barra
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Color del borde sólido para cada barra
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
                        beginAtZero: true // Comenzar el eje Y en 0
                    }
                }
            }
        });
    </script>

</x-app-layout>
