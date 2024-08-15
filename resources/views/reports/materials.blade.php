<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <title>Materiales</title>

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

    <h1 style="text-align: center; margin-top: 70px;">Reporte de Materiales</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Peso</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $material->name }}</td>
                    <td>
                        <img src="{{ public_path($material->image) }}" alt="Imagen del material" id="image">
                    </td>
                    <td>{{ $material->description }}</td>
                    <td>{{ $material->category->name }}</td>
                    <td>{{ $material->weight }}</td>
                    <td>{{ $material->value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
