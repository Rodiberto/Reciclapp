<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Reciclapp - Términos y Condiciones') }}</title>

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
            <h2 class="mt-12 mb-4 text-gray-800 font-bold text-4xl leading-tight tracking-tight">Términos y Condiciones
            </h2>
        </div>
    </header>


    <div class="ex-basic-1 py-12">
        <div class="container mx-auto px-4 sm:px-8 xl:max-w-5xl xl:px-12">
            <h2 class="mt-12 mb-4 text-gray-800 font-bold text-3xl leading-tight tracking-tight">Términos y condiciones
                de uso</h2>
            <p class="mb-12">Bienvenido a Reciclapp. Estos Términos y Condiciones regulan el uso de nuestro software,
                ya sea en su versión web o móvil. Al acceder y utilizar Reciclapp, aceptas cumplir con las disposiciones
                establecidas en este contrato. Si no estás de acuerdo con estos términos, te recomendamos no utilizar el
                software.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Definiciones:</h3>
            <ul class="list-disc list-inside mb-12">
                <li><strong>Software:</strong> Se refiere a la aplicación web y móvil denominada Reciclapp.</li>
                <li><strong>Usuario:</strong> Cualquier persona que accede y utiliza el software.</li>
            </ul>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Licencia:</h3>
            <p class="mb-12"><strong>Licencia de uso:</strong> Reciclapp concede al usuario una licencia limitada, no
                exclusiva, no transferible y revocable para acceder y utilizar el software conforme a estos Términos y
                Condiciones. El uso del software está destinado únicamente para fines personales y no comerciales.</p>
            <p class="mb-12"><strong>Restricciones:</strong> El usuario no podrá, bajo ninguna circunstancia,
                modificar, descompilar, realizar ingeniería inversa, distribuir o comercializar el software sin el
                consentimiento expreso de Reciclapp.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Uso permitido:</h3>
            <p class="mb-12">El software de Reciclapp debe utilizarse exclusivamente para la gestión de residuos y la
                coordinación de recolección de materiales reciclables. Cualquier uso que implique daño, interrupción o
                alteración en el funcionamiento del software está prohibido.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Responsabilidades del
                usuario:</h3>
            <p class="mb-12">El usuario es responsable de la veracidad de los datos proporcionados al utilizar
                Reciclapp. Asimismo, el usuario debe garantizar que su uso del software cumple con las leyes y
                regulaciones aplicables en su jurisdicción.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Privacidad y protección
                de datos:</h3>
            <p class="mb-12">El uso de Reciclapp está sujeto a nuestro Aviso de Privacidad, disponible en <a
                    href="https://reciclapp.net/aviso-de-privacidad"
                    class="text-blue-600 underline">https://reciclapp.net/aviso-de-privacidad</a>. Nos comprometemos a
                proteger la información personal de los usuarios de acuerdo con las leyes aplicables.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Modificaciones al
                software:</h3>
            <p class="mb-12">Reciclapp se reserva el derecho de actualizar, modificar o descontinuar el software en
                cualquier momento sin previo aviso. El uso continuo del software después de dichos cambios constituye la
                aceptación de los mismos.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Limitación de
                responsabilidad:</h3>
            <p class="mb-12">Reciclapp no se hace responsable de daños directos o indirectos que puedan derivarse del
                uso o imposibilidad de uso del software, incluidos, entre otros, fallos técnicos, interrupciones en el
                servicio o pérdida de datos.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Duración y terminación:
            </h3>
            <p class="mb-12">Esta licencia tendrá una duración indefinida, pero Reciclapp se reserva el derecho de
                revocarla en cualquier momento si se incumplen estos Términos y Condiciones.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Jurisdicción:</h3>
            <p class="mb-12">Este contrato se regirá e interpretará de acuerdo con las leyes de México, y cualquier
                disputa que surja en relación con el mismo deberá resolverse ante los tribunales competentes.</p>

            <h3 class="mt-8 mb-2 text-gray-800 font-bold text-2xl leading-tight tracking-tight">Contacto:</h3>
            <p class="mb-12">Si tienes preguntas sobre estos Términos y Condiciones, puedes contactarnos a través de <a
                    href="mailto:info.reciclapp@gmail.com" class="text-green-600 underline">info.reciclapp@gmail.com</a>.
            </p>
        </div>
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
                    <li class="mb-2"><a href="{{route('terminos_condiciones')}}">Términos & Condiciones</a></li>
                </ul>
            </div>

            <div>
                <p class="pb-2 p-small statement">Reciclapp © <a class="no-underline">Todos los
                        derechos reservados</a></p>
            </div>

            <div class="flex items-center justify-end">

                <ul class="mb-4 list-unstyled p-small">
                    <li class="mb-2"><a href="{{route('aviso_privacidad')}}">Aviso de Privacidad</a></li>
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
