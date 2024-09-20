<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <title>Solicitudes</title>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        #image {
            width: 50px;
            height: 50px;
        }

        .header, .footer {
            position: fixed;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #fff;
            text-align: center;
            line-height: 60px;
        }

        .header {
            top: 0;
            background: url('{{ public_path("img/header.png") }}') no-repeat center;
            background-size: cover;
        }

        .footer {
            bottom: 0;
            background: url('{{ public_path("img/footer.png") }}') no-repeat center;
            background-size: cover;
            font-size: 12px;
            line-height: 30px;
        }

    </style>
</head>

<body>
    <div class="header"></div>

    <div class="footer"></div>

    <h1 style="text-align: center; margin-top: 70px;">Solicitudes de recolección</h1>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Estado</th>
                <th>Total aproximado (kg)</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request['code'] }}</td>
                    <td>{{ $request['status'] }}</td>
                    <td>{{ $request['total_weight'] }} kg</td>
                    <td>{{ $request->date }}</td>
                    <td>{{ $request->hour }}</td>
                    <td>{{ $request->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
