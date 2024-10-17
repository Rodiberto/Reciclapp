<head>

    <meta property="og:site_name" content="" />
    <meta property="og:site" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Reciclapp') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body data-spy="scroll" data-target=".fixed-top">

    <nav class="navbar fixed-top">
        <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">
            <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline"
                href="{{ route('home') }}">
                <img src="{{ asset('img/logo2.png') }}" alt="alternative" class="h-8" />
            </a>
            <a class="text-gray-800 font-semibold text-3xl leading-4 no-underline page-scroll"
                href="{{ route('home') }}">Reciclapp</a>

            <button
                class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400"
                type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center"
                id="navbarsExampleDefault">
                <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                    <li>
                        <a class="nav-link page-scroll" href="{{ route('home') }}">Inicio <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a class="nav-link page-scroll" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                    <li>
                        <a class="nav-link page-scroll" href="{{ route('register') }}">Registrarse</a>
                    </li>
                    <li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>







    <header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">


        @if (session()->has('message') || session()->has('session_expired') || session()->has('permission_denied'))
            <div id="messageModal" class="fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 text-center max-w-sm w-full">
                    @if (session()->has('message'))
                        <div class="text-green-700 bg-white border-l-4 border-green-500 p-3 rounded-lg">
                            <strong>Éxito:</strong> {{ session()->get('message') }}
                        </div>
                    @endif
                    @if (session()->has('session_expired'))
                        <div class="text-green-700 bg-white border-l-4 border-green-500 p-3 rounded-lg">
                            <strong>Estado:</strong> {{ session()->get('session_expired') }}
                        </div>
                    @endif
                    @if (session()->has('permission_denied'))
                        <div class="text-red-700 bg-white border-l-4 border-red-500 p-3 rounded-lg">
                            <strong>Error:</strong> {{ session()->get('permission_denied') }}
                        </div>
                    @endif
                </div>
            </div>
        @endif


        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
            <div class="mb-16 lg:mt-32 xl:mt-40 xl:mr-12">
                <h1 class="h1-large mb-5">Aplicación móvil de Reciclapp</h1>
                <p class="p-large mb-8">¡Únete al cambio! Comienza a reciclar de forma fácil y rápida con Reciclapp.
                    Encuentra puntos de recolección cercanos, organiza tus materiales y contribuye a un mundo más verde.
                </p>

                <a class="btn-solid-lg secondary" href="#your-link"><i class="fab fa-google-play"></i>Descargar</a>
            </div>
            <div class="xl:text-right">
                <img class="inline" src="{{ asset('img/reciclapp.png ') }}" alt="alternative" />
            </div>
        </div>
    </header>









    <div id="details" class="pt-12 pb-16 lg:pt-16">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
            <div class="lg:col-span-5">
                <div class="mb-16 lg:mb-0 xl:mt-16">
                    <h2 class="mb-6 text-4xl font-bold text-gray-800">Acerca de nosotros</h2>

                    <p class="p-large mb-8">En Just Code, somos un equipo comprometido con el desarrollo de soluciones
                        tecnológicas innovadoras
                        que responden a las necesidades actuales del mercado.</p>
                    <p class="p-large mb-8"> Nuestro enfoque se basa en la creación de
                        herramientas digitales que generan un impacto positivo en la sociedad y el medio ambiente.</p>
                </div>
            </div>
            <div class="lg:col-span-7">
                <div class="xl:ml-14">
                    <img class="inline  rounded-lg" src="{{ asset('img/about-us.jpg') }}" alt="alternative" />
                </div>
            </div>
        </div>
    </div>



    <div class="py-24">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
            <div class="lg:col-span-7">
                <div class="mb-12 lg:mb-0 xl:mr-14">
                    <img class="inline rounded-lg" src="{{ asset('img/mission.jpg') }}" alt="alternative" />
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="xl:mt-12">
                    <h2 class="mb-6 text-4xl font-bold text-gray-800">Misión</h2>
                    <p class="p-large mb-8">Facilitar la vida de las personas a través del uso de la tecnología
                        aportando
                        valor
                        y generando un
                        impacto positivo en la vida cotidiana de la sociedad.</p>
                    <p class="p-large mb-8">Desarrollamos soluciones innovadoras con
                        enfoque especial en la calidad.</p>

                </div>
            </div>
        </div>
    </div>



    <div class="pt-16 pb-12">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
            <div class="lg:col-span-5">
                <div class="mb-16 lg:mb-0 xl:mt-16">
                    <h2 class="mb-6 text-4xl font-bold text-gray-800">Visión</h2>
                    <p class="p-large mb-8">En JUSTCODE, buscamos para 2025 ser una empresa líder en el desarrollo de
                        software,
                        marcando la
                        pauta hacia un futuro sustentable, así como diseñar y desarrollar servicios y soluciones de
                        software
                        diferenciales.</p>
                </div>
            </div>
            <div class="lg:col-span-7">
                <div class="ml-14">
                    <img class="inline" src="{{ asset('img/vision.jpg') }}" alt="alternative" />
                </div>
            </div>
        </div>
    </div>



    <div class="slider-1 py-16 bg-gray h-96">
        <div class="container px-4 sm:px-8">
            <h2 class="mb-12 text-3xl font-bold text-center lg:max-w-xl lg:mx-auto text-gray-800">Nuestro Equipo</h2>


            <div class="slider-container">
                <div class="swiper-container card-slider flex justify-center items-center">
                    <div class="swiper-wrapper">


                        <div class="swiper-slide">
                            <div class="card">

                                <img class="card-image " src="img/team/scrum-master-leiber.png" alt="alternative" />

                                <div class="card-body">
                                    <p class="testimonial-author">Leiber Trejo - Scrum Master</p>
                                </div>
                            </div>
                        </div>



                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="img/team/diseñador-fabian.png" alt="alternative" />
                                <div class="card-body">
                                    <p class="testimonial-author">Fabián Alcázar - Scrum Team</p>
                                </div>
                            </div>
                        </div>



                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="img/team/documentador-luis.png" alt="alternative" />
                                <div class="card-body">
                                    <p class="testimonial-author">Luis Lara - Scrum Team</p>
                                </div>
                            </div>
                        </div>



                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="img/team/tester-fernando.png" alt="alternative" />
                                <div class="card-body">
                                    <p class="testimonial-author">Luis Guillén - Scrum Team</p>
                                </div>
                            </div>
                        </div>



                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="img/team/desarrollador-rodiber.png" alt="alternative" />
                                <div class="card-body">
                                    <p class="testimonial-author">Rodiber Cruz - Scrum Team</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>


        </div>
    </div>




    <div id="pricing" class="cards-2">
        <div class="absolute bottom-0 h-40 w-full bg-white"></div>

        <div class="container px-4 pb-px sm:px-8">
            <h2 class="mb-2.5 text-3xl font-bold text-white lg:max-w-xl lg:mx-auto py-">¡Apoya nuestra App de
                Reciclaje!</h2>


            <div class="card">
                <div class="card-body">

                    <div class="col-span-2 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="Logo PayPal"
                            class="mx-auto mb-4 h-12">

                        <p class="text-gray-600 p-large mb-8">Tu donación nos ayuda a seguir promoviendo la recolección
                            de
                            materiales
                            reciclables y cuidar el medio ambiente.</p>
                    </div>


                    <div class="flex justify-center items-center">
                        <a href="https://www.paypal.com/donate/?hosted_button_id=M59RS3JBBTRUG"
                            class="px-6 py-3 bg-yellow-400 text-blue-700 font-semibold rounded-md hover:bg-yellow-500 transition flex items-center space-x-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png"
                                alt="PayPal" class="h-5">
                            <span>Donar con PayPal</span>
                        </a>
                    </div>

                    <div class="py-4 flex justify-center items-center">
                        <img src="/img/donate.png" alt="Donar" class="max-w-full h-auto">
                    </div>

                    <div class="flex items-center justify-center">
                        <p class="text-center text-gray-600 p-large mb-8">
                            Gracias por tu apoyo.
                        </p>
                    </div>

                </div>
            </div>




        </div>
    </div>


    <div class="w-full md:w-2/3 lg:w-1/2 mx-auto p-6 bg-white shadow-lg rounded-lg">
        <div class="flex items-center justify-center md:text-left mb-6">
            <h2 class="text-2xl font-bold text-gray-400 mb-2 text-center">ENVÍANOS UN MENSAJE</h2>
        </div>
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <input type="text" name="name"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Tu nombre">
                </div>
                <div class="mb-4">
                    <input type="email" name="email"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Tu correo electrónico">
                </div>
            </div>
            <div class="mb-4">
                <input type="text" name="subject"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Asunto">
            </div>
            <div class="mb-4">
                <textarea name="message"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    cols="30" rows="3" placeholder="Mensaje"></textarea>
            </div>
            <div class="text-center md:text-left">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-lg"
                    id="send-mail">
                    Enviar
                </button>
            </div>
        </form>
    </div>










    <div class="footer">
        <div class="container px-4 sm:px-8">

            <h4 class="mb-8 text-lg font-semibold lg:max-w-3xl lg:mx-auto">
                Reciclapp es esencial para la sostenibilidad ambiental. Separa tus residuos y deposítalos en los
                contenedores adecuados. Para más información, contacta a nuestro equipo en:
                <a class="text-green-700 hover:text-green-500"
                    href="mailto:info.reciclapp@gmail.com">info.reciclapp@gmail.com</a>
            </h4>

            <div class="social-container">
                <span class="fa-stack">
                    <a href="https://github.com/Rodiberto/Reciclapp.git" target="_blank">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x"></i>
                    </a>
                </span>

                <span class="fa-stack">
                    <a href="https://instagram.com/reciclappnet" target="_blank">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x"></i>
                    </a>
                </span>

            </div>
        </div>
    </div>




    <div class="copyright">
        <div class=" flex container px-4 sm:px-8 lg:grid lg:grid-cols-3">

            <div>
                <ul class="mb-4 list-unstyled p-small">
                    <li class="mb-2 text-gray-500 hover:text-white"><a
                            href="{{ route('terminos_condiciones') }}">Términos &
                            Condiciones</a></li>
                </ul>
            </div>

            <div>
                <p class="pb-2 p-small statement text-gray-500">Reciclapp © <a class="no-underline">Todos los
                        derechos reservados</a></p>
            </div>

            <div class="flex items-center justify-end">

                <ul class="mb-4 list-unstyled p-small">
                    <li class="mb-2 text-gray-500 hover:text-white"><a href="{{ route('aviso_privacidad') }}">Aviso
                            de Privacidad</a>
                    </li>
                </ul>

            </div>

        </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('messageModal');
            if (modal) {
                setTimeout(function() {
                    modal.style.display = 'none';
                }, 3000);
            }
        });
    </script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>
