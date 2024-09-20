<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Reciclapp - Aviso de Privacidad') }}</title>

    <meta property="og:site_name" content="" />
    <meta property="og:site" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta name="twitter:card" content="summary_large_image" />


    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body data-spy="scroll" data-target=".fixed-top">


    <nav class="navbar fixed-top">
        <div
            class="container mx-auto flex flex-wrap items-center justify-between sm:px-4 lg:flex-nowrap lg:px-8 xl:max-w-6xl">

            <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline"
                href="{{ route('home') }}">
                <img src="{{ asset('img/logo2.png') }}" alt="alternative" class="h-8" />
            </a>

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


    <header class="ex-header bg-gray">
        <div class="container mx-auto px-4 sm:px-8 xl:max-w-6xl xl:px-4">
            <h2 class="mt-12 mb-4 text-gray-800 font-bold text-4xl leading-tight tracking-tight">Política de Privacidad
            </h2>
        </div>
    </header>


    <div class="ex-basic-1 py-12">
        <div class="container mx-auto px-4 sm:px-8 xl:max-w-5xl xl:px-12">
            <h2 class="mt-12 mb-4 text-gray-800 font-bold text-3xl leading-tight tracking-tight">Para Reciclapp, es muy
                importante su privacidad y confianza</h2>
            <p class="mb-12">Es por ello que con apego a lo establecido por la Ley Federal de Protección de Datos
                Personales en Posesión de los Particulares (en lo sucesivo, la Ley), ponemos a su disposición el
                presente Aviso de Privacidad.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Responsable:</h3>
            <p class="mb-12">RECICLAPP es responsable de recabar sus datos personales y utilizarlos en estricto apego a
                la Ley. Del mismo modo, hacemos de su conocimiento que RECICLAPP ha implementado medidas suficientes
                para la protección y confidencialidad de sus datos.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Datos personales:</h3>
            <p class="mb-12">Recabamos sus datos cuando usted nos los proporciona directamente; o cuando utiliza
                nuestro sitio web y nuestra aplicación móvil. Los datos personales que recabamos incluyen:</p>
            <ul class="list-disc list-inside mb-12">
                <li>Nombre completo</li>
                <li>Teléfono</li>
                <li>Correo electrónico</li>
                <li>Fotos de perfil</li>
                <li>Ubicación</li>
            </ul>
            <p class="mb-12">En la app móvil también utilizamos acceso a:</p>
            <ul class="list-disc list-inside mb-12">
                <li>Cámara</li>
                <li>Ubicación</li>
                <li>Notificaciones</li>
                <li>Almacenamiento</li>
            </ul>
            <p class="mb-12">Estos datos se recaban con su consentimiento expreso.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Finalidad:</h3>
            <p class="mb-12">Los datos personales recabados serán utilizados para los siguientes objetivos:</p>
            <ol class="list-decimal list-inside mb-12">
                <li>Gestionar solicitudes de recolección de residuos.</li>
                <li>Enviar notificaciones relacionadas con su cuenta y solicitudes.</li>
                <li>Facilitar la recuperación de contraseñas y otros procesos de gestión de cuenta.</li>
                <li>Mantener la seguridad de la cuenta y mejorar la experiencia de usuario.</li>
            </ol>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Seguridad:</h3>
            <p class="mb-12">RECICLAPP almacenará sus datos en medios electrónicos, para los cuales hemos implementado
                medidas de seguridad administrativas, técnicas y físicas con el fin de proteger sus datos personales. No
                compartimos los datos con terceros.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Arco:</h3>
            <p class="mb-12">En caso de que usted desee ejercer sus derechos de Acceso, Rectificación, Cancelación y/u
                Oposición (en lo sucesivo, “Derechos ARCO”), ponemos a su disposición los siguientes medios de contacto:
            </p>
            <ul class="list-disc list-inside mb-12">
                <li>Correo electrónico: <a href="mailto:info.reciclapp@gmail.com"
                        class="text-blue-600 underline">info.reciclapp@gmail.com</a></li>
                <li>Comunicarse al teléfono: (919) 147 22 15</li>
            </ul>
            <p class="mb-12">Para procesar su solicitud, deberá incluir su nombre completo o correo electrónico,
                acompañar documentos que acrediten su identidad, e incluir una descripción clara de los datos personales
                sobre los cuales desea ejercer sus derechos.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Transferencia:</h3>
            <p class="mb-12">RECICLAPP no transferirá sus datos personales a terceros.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Cambios:</h3>
            <p class="mb-12">RECICLAPP se reserva el derecho de cambiar, modificar, complementar y/o alterar el
                presente Aviso de Privacidad en cualquier momento, en cuyo caso se lo notificaremos a través de nuestro
                sitio web <a href="https://reciclapp.net" class="text-blue-600 underline">https://reciclapp.net</a>.
                Para cualquier duda o aclaración escribir a la siguiente dirección de correo electrónico: <a
                    href="mailto:info.reciclapp@gmail.com" class="text-blue-600 underline">info.reciclapp@gmail.com</a>.
            </p>
        </div>
    </div>












    <div class="footer">
        <div class="container px-4 sm:px-8">

            <h4 class="mb-8 text-lg font-semibold lg:max-w-3xl lg:mx-auto">
                Reciclapp es esencial para la sostenibilidad ambiental. Separa tus residuos y deposítalos en los
                contenedores adecuados. Para más información, contacta a nuestro equipo en:
                <a class="text-indigo-600 hover:text-gray-500"
                    href="mailto:info.reciclapp@gmail.com">info.reciclapp@gmail.com</a>
            </h4>

            <div class="social-container">
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>

                <span class="fa-stack">
                    <a href="#your-link">
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
                    <li class="mb-2"><a href="{{route('terminos_condiciones')}}">Termimos & Condiciones</a></li>
                </ul>
            </div>

            <div>
                <p class="pb-2 p-small statement">Reciclapp © <a href="#your-link" class="no-underline">Todos los
                        derechos reservados</a></p>
            </div>

            <div class="flex items-center justify-end">

                <ul class="mb-4 list-unstyled p-small">
                    <li class="mb-2"><a href="{{route('aviso_privacidad')}}">Política de Privacidad</a></li>
                </ul>

            </div>

        </div>


    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>
