<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Reciclapp') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bg_custom.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">
</head>


<body>
    <div>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom py-4">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" height="30" width="30">
                    <span>Reciclapp</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Quiénes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                        <!-- Agrega más enlaces según tu necesidad -->
                    </ul>
                    <ul class="navbar-nav ml-4">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="container my-5">
            <div class="text-center">
                <h1 class="display-4 text-dark mb-4">Bienvenido a Reciclapp</h1>
                <p class="lead text-dark mb-4">Somos una plataforma dedicada al reciclaje y cuidado del medio ambiente.</p>
                <p class="lead text-dark mb-4">Descubre cómo puedes contribuir, qué materiales reciclamos y dónde estamos ubicados.</p>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-custom text-white py-4">
            <div class="container text-center">
                <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" class="mb-3" height="50" width="50">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="text-light">Inicio</a></li>
                    <li class="list-inline-item"><a href="#" class="text-light">Quiénes Somos</a></li>
                    <li class="list-inline-item"><a href="#" class="text-light">Contacto</a></li>
                    <!-- Agrega más enlaces según tu necesidad -->
                </ul>
                <p class="mt-3 mb-0">&copy; {{ date('Y') }} Reciclapp. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlR0CQYAJvhWITQFfAz7S6oVO3MGMIwtcO/8swLZIjE8dDkNr6pQAO6ZQ5s" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTJSYLfbsnZIj2tU5S5KsG4f5xc13Vmnb1HMSYv+U8zUspO6N2" crossorigin="anonymous"></script>
</body>

</html>
