<!DOCTYPE html>
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
                labels: ['Contenedores', 'Bolsas'], // Etiquetas para cada barra
                datasets: [{
                    label: 'Total',
                    data: [{{ $totalContainers }}, {{ $totalBags }}], // Datos para cada etiqueta
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Color para Contenedores
                        'rgba(153, 102, 255, 0.2)', // Color para Bolsas
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Borde para Contenedores
                        'rgba(153, 102, 255, 1)', // Borde para Bolsas
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
</html>
