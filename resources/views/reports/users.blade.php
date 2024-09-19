<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <title>Usuarios</title>

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

    <h1 style="text-align: center; margin-top: 70px;">Reporte de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Teléfono</th>
                <th>Correo electrónico</th>
                <th>Rol</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                        <img src="{{ public_path($user->photo) }}" alt="Imagen de perfil" id="image">
                    </td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
