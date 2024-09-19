<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Reciclapp') }}</title>
    <!-- Title -->
    <title>Reciclapp</title>

    <!-- Favicon -->
    <!-- <link rel="icon" href="img/core-img/favicon.ico"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Navbar Area ***** -->
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

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Inicio</a></li>
                                    <li><a href="{{route ('servicios')}}">Servicios</a></li>
                                    <li><a href="{{route ('contactanos')}}">Contáctanos</a></li>
                                    <li><a href="register">Registrarse</a></li>
                                    <li><a href="login">Iniciar Sesión</a></li>

                                    <!-- Navbar End -->
                            </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search"
                                placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(img/bg-img/server.jpg);">
            <h2>SERVICIOS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Servicios</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>SERVICIOS</h2>
                        <p>"Ofrecemos servicios de recolección de residuos reciclables, ayudando a reducir la
                            contaminación y promoviendo prácticas más sostenibles para el planeta."</p>
                    </div>
                    <!-- Progress Bar Content Area -->
                    <div class="alazea-progress-bar mb-50">
                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Reciclaje de papel</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="70"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Reciclaje de plástico</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="90"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Reciclaje de aluminio</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="85"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Reciclaje de vidrio</p>
                            <div id="bar4" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="75"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <!-- <img src="img/core-img/b1.png" alt=""> -->
                                    <h5>Escaneo de Residuos</h5>
                                    <p>Identifica y clasifica tus residuos de manera rápida y sencilla.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <!-- <img src="img/core-img/b2.png" alt=""> -->
                                    <h5>Ubicaciones de Depósitos</h5>
                                    <p>Encuentra y accede a los depósitos más cercanos donde puedes entregar tus
                                        residuos reciclables.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <!-- <img src="img/core-img/b3.png" alt=""> -->
                                    <h5>Programación de Recolección</h5>
                                    <p>Elige una fecha y hora para que un recolector venga a tu domicilio o para llevar
                                        tus residuos a un punto de acopio.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <!-- <img src="img/core-img/b4.png" alt=""> -->
                                    <h5>Recordatorio y Notificaciones</h5>
                                    <p>Recibe alertas sobre tus próximas recolecciones y consejos sobre cómo mejorar tu
                                        reciclaje.</p>
                                </div>  
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <!-- <img src="img/core-img/b4.png" alt=""> -->
                                    <h5>Educación Ambiental</h5>
                                    <p>Ofrecer cursos o talleres en línea sobre reciclaje, reducción de residuos y sostenibilidad.</p>
                                </div>  
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <!-- <img src="img/core-img/b4.png" alt=""> -->
                                    <h5>Monitoreo de Residuos</h5>
                                    <p>Un servicio para que los usuarios puedan visualizar su historial sobre la cantidad y tipo de residuos que han reciclado.</p>
                                </div>  
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Aprende</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <i class="fas fa-recycle fa-3x"></i> <!-- Ícono de reciclaje -->
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Tipos de Residuos</h5>
                                <p>Aprende a identificar residuos reciclables como plástico, papel, vidrio y aluminio, y
                                    cómo separarlos correctamente.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <i class="fas fa-leaf fa-3x"></i> <!-- Ícono de hoja, simbolizando sostenibilidad -->
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Beneficios del Reciclaje</h5>
                                <p>Descubre cómo el reciclaje reduce la contaminación, ahorra recursos naturales y
                                    disminuye la huella de carbono.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <i class="fas fa-home fa-3x"></i> <!-- Ícono de casa -->
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Cómo Reciclar en Casa</h5>
                                <p>Consejos prácticos para empezar a reciclar en tu hogar, organizando tus residuos de
                                    manera eficiente y fácil.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-video-area bg-overlay mb-100">
                        <img src="img/bg-img/reciclaje.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section class="team-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>Nuestro Equipo</h2>
                </div>
            </div>
        </div>

        <!-- Carousel -->
        <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex">
                        <!-- Single Team Member Area -->
                        <div class="team-member-wrapper px-2">
                            <div class="single-team-member text-center mb-4">
                                <!-- Team Member Thumb -->
                                <div class="team-member-thumb">
                                    <img src="img/team/scrum-master-leiber.png" class="d-block w-100" alt="Leiber Mauricio Gomez Trejo">
                                </div>
                                <!-- Team Member Info -->
                                <div class="team-member-info mt-3">
                                    <h5>Leiber Mauricio Gomez Trejo</h5>
                                    <!-- <p>CEO &amp; Founder</p> -->
                                </div>
                            </div>
                        </div>

                        <!-- Single Team Member Area -->
                        <div class="team-member-wrapper px-2">
                            <div class="single-team-member text-center mb-4">
                                <!-- Team Member Thumb -->
                                <div class="team-member-thumb">
                                    <img src="img/team/diseñador-fabian.png" class="d-block w-100" alt="José Fabián Alcázar Ramírez">
                                </div>
                                <!-- Team Member Info -->
                                <div class="team-member-info mt-3">
                                    <h5>José Fabián Alcázar Ramírez</h5>
                                    <!-- <p>Garden Designer</p> -->
                                </div>
                            </div>
                        </div>

                        <!-- Single Team Member Area -->
                        <div class="team-member-wrapper px-2">
                            <div class="single-team-member text-center mb-4">
                                <!-- Team Member Thumb -->
                                <div class="team-member-thumb">
                                    <img src="img/team/documentador-luis.png" class="d-block w-100" alt="Luis Antonio Lopez Lara">
                                </div>
                                <!-- Team Member Info -->
                                <div class="team-member-info mt-3">
                                    <h5>Luis Antonio Lopez Lara</h5>
                                    <!-- <p>Plan Manager</p> -->
                                </div>
                            </div>
                        </div>

                        <!-- Single Team Member Area -->
                        <div class="team-member-wrapper px-2">
                            <div class="single-team-member text-center mb-4">
                                <!-- Team Member Thumb -->
                                <div class="team-member-thumb">
                                    <img src="img/team/tester-fernando.png" class="d-block w-100" alt="Luis Fernando Guillen Gonzales">
                                </div>
                                <!-- Team Member Info -->
                                <div class="team-member-info mt-3">
                                    <h5>Luis Fernando Guillen Gonzales</h5>
                                    <!-- <p>Marketer</p> -->
                                </div>
                            </div>
                        </div>

                        <!-- Single Team Member Area -->
                        <div class="team-member-wrapper px-2">
                            <div class="single-team-member text-center mb-4">
                                <!-- Team Member Thumb -->
                                <div class="team-member-thumb">
                                    <img src="img/team/desarrollador-rodiber.png" class="d-block w-100" alt="Rodiber Cruz Morales">
                                </div>
                                <!-- Team Member Info -->
                                <div class="team-member-info mt-3">
                                    <h5>Rodiber Cruz Morales</h5>
                                    <!-- <p>Marketer</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Indicators -->
            <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#teamCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            </div> -->
        </div>
    </div>
</section>
    <!-- ##### Team Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
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

    <!-- ##### All Javascript Files ##### -->
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