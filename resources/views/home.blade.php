<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Reciclapp') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Tu CSS -->
 <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">
            <div class="single-hero-post bg-overlay">
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/fondo.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h2>¡Reciclar transforma desechos en vida para el planeta. ¡Únete al cambio!</h2>
                                <p>El reciclaje transforma residuos en recursos, cuidando el medio ambiente y promoviendo un futuro sostenible. ¡Haz tu parte, recicla hoy!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>












<section>
<div class="flex flex-col items-center justify-center w-full">
 
<div class="py-6">
<h1 class="text-3xl font-bold">Quiénes Somos</h1>
</div>
 <div class="grid grid-cols-3 px-6 w-full gap-4">
              <!-- Acerca de Nosotros -->
              <div class="col-span-1">
                 <h3 class="text-2xl font-bold mb-4 text-center">Acerca de Nosotros</h3>
                 <p class="text-lg  text-justify">
                     En Just Code, somos un equipo comprometido con el desarrollo de soluciones tecnológicas innovadoras que responden a las necesidades actuales del mercado. Nuestro enfoque se basa en la creación de herramientas digitales que generan un impacto positivo en la sociedad y el medio ambiente.
                 </p>
             </div>
             <!-- Misión -->
             <div class="col-span-1">
                 <h3 class="text-2xl font-bold mb-4 text-center">Misión</h3>
                 <p class="text-lg  text-justify">
                     Facilitar la vida de las personas a través del uso de la tecnología aportando valor y generando un impacto positivo en la vida cotidiana de la sociedad, desarrollamos soluciones innovadoras con enfoque especial en la calidad.
                 </p>
             </div>
             <!-- Visión -->
             <div class="col-span-1">
                 <h3 class="text-2xl font-bold mb-4 text-center">Visión</h3>
                 <p class="text-lg text-justify">
                     En JUSTCODE, buscamos para 2025 ser una empresa líder en el desarrollo de software, marcando la pauta hacia un futuro sustentable, así como diseñar y desarrollar servicios y soluciones de software diferenciales.
                 </p>
             </div>

 </div>

</div>
</section>

















    <!-- ##### Fin de la sección Quienes Somos ##### -->
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