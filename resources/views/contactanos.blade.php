<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Reciclapp') }}</title>

    <!-- Favicon -->
    <!-- <link rel="icon" href="img/core-img/favicon.ico"> -->

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tu CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">
                        <div style="display: flex; align-items: center;">
                            <img src="{{ asset('/img/logo.png') }}" alt="Logo Reciclapp" height="30" width="30">
                            <h1 style="margin-left: 10px; color: white;">Reciclapp</h1>
                        </div>

                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Inicio</a></li>
                                    <li><a href="{{route ('servicios')}}">Servicios</a></li>
                                    <li><a href="{{route ('contactanos')}}">Contáctanos</a></li>
                                    <li><a href="/login">Iniciar Sesión</a></li>
                                    <li><a href="/register">Registrarse</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(img/bg-img/server.jpg);">
            <h2>CONTACTANOS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contactanos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Info Start ##### -->
    <!-- Sección de Información de Contacto y Formulario -->
<!-- Sección de Información de Contacto y Formulario -->
<div class="contact-area-info section-padding-0-100">
    <div class="container">
        <div class="row align-items-start">
            <!-- Información de Contacto -->
            <div class="col-12 col-md-6 mb-4 mb-md-0 text-center text-md-start">
                <div class="section-heading mb-4">
                    <h2>CONTACTANOS</h2>
                </div>
                <div class="contact-information">
                    <div class="d-flex align-items-center mb-4 justify-content-center justify-content-md-start">
                        <i class="fas fa-map-marker-alt fa-2x me-3"></i>
                        <p class="mb-0"><strong>Dirección:</strong> C.P. 29950, Ocosingo, Chis.</p>
                    </div>
                    <div class="d-flex align-items-center mb-4 justify-content-center justify-content-md-start">
                        <i class="fas fa-phone-alt fa-2x me-3"></i>
                        <p class="mb-0"><strong>Teléfono:</strong> +52 919 147 22 15</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <i class="fas fa-envelope fa-2x me-3"></i>
                        <p class="mb-0"><strong>Email:</strong> info.reciclapp@gmail.com</p>
                    </div>
                </div>
            </div>

            <!-- Formulario de Contacto -->
            <div class="col-12 col-md-6 d-flex align-items-center">
                <div class="contact-form-area">
                    <div class="section-heading mb-4 text-center text-md-start">
                        <h2>ENVIANOS UN MENSAJE</h2>
                        <p>Te responderemos lo antes posible.</p>
                    </div>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" placeholder="Tu Nombre">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="contact-email" placeholder="Tu Correo Electrónico">
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-subject" placeholder="Asunto">
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-3">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Sección del Mapa -->
<!-- Sección del Mapa -->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d567.4122201211126!2d-92.09873423633285!3d16.90882500498884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ecd8a00ea699ef%3A0x963d8be8a2acd38a!2sCCEC%20ESCUELA%20DE%20COMPUTACION%20OCOSINGO!5e0!3m2!1ses-419!2smx!4v1726517124974!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area" style="background-color: #4CAF50; color: white; padding: 40px 0;">
    <!-- Main Footer Area -->
    <div class="container">
        <div class="row">
            <!-- Logo y descripción -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget">
                    <div class="footer-logo mb-30">
                        <a href="#"><img src="img/logo.png" alt="Reciclapp Logo" class="footer-logo-img"></a>
                    </div>

                    <p style="color: white;">Somos una organización dedicada al reciclaje y sostenibilidad, ayudando a reducir el impacto ambiental y promover prácticas responsables.</p>
                    <div class="social-info">
                    <a href="https://www.facebook.com/tu-pagina-facebook" target="_blank" style="color: white; font-size: 24px; margin-right: 15px;">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.instagram.com/tu-cuenta-instagram" target="_blank" style="color: white; font-size: 24px; margin-right: 15px;">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>

                    </div>
                </div>
            </div>

            <!-- Nuestros Servicios -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget">
                    <h4 style="color: white;">Nuestros Servicios</h4>
                    <ul>
                        <li><a href="#" style="color: white;">Escaneo de Residuos</a></li>
                        <li><a href="#" style="color: white;">Ubicaciones de Depósitos</a></li>
                        <li><a href="#" style="color: white;">Programación de Recolección</a></li>
                        <li><a href="#" style="color: white;">Recordatorio y Notificaciones</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contacto -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget">
                    <h4 style="color: white;">Contáctanos</h4>
                    <ul>
                        <li style="color: white;">Teléfono: +52 919 147 22 15</li>
                        <li style="color: white;">Email: info.reciclapp@gmail.com</li>
                        <li style="color: white;">Dirección: C.P. 29950, Ocosingo, Chis.</li>
                    </ul>
                </div>
            </div>

            <!-- Información adicional -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget">
                    <h4 style="color: white;">Información Adicional</h4>
                    <ul>
                        <li><a href="#" style="color: white;">Política de Privacidad</a></li>
                        <li><a href="#" style="color: white;">Términos y Condiciones</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="container text-center pt-4">
        <p style="color: white;">&copy; 2024 Reciclapp. Todos los derechos reservados.</p>
    </div>
</footer>
    <!-- ##### Footer Area End ##### -->

    <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/plugins.js')}}"></script>
    <script src="{{asset('js/active.js')}}"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>

</html>