@extends('layouts.home')

@section('content')
    {{-- <style>
        .hero-area {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            animation: zoom 10s infinite alternate;
        }

        @keyframes zoom {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.05);
            }
        }
    </style>
    <section class="hero-area relative h-screen bg-cover bg-center" style="background-image: url('img/bg-img/fondo.jpg');">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="text-center text-white px-4">
                <h2 class="text-4xl font-bold mb-4">¡Reciclar transforma desechos en vida para el planeta. ¡Únete al cambio!
                </h2>
                <p class="text-lg">El reciclaje transforma residuos en recursos, cuidando el medio ambiente y promoviendo un
                    futuro sostenible. ¡Haz tu parte, recicla hoy!</p>
            </div>
        </div>
    </section> --}}







    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-4">Aviso de Privacidad</h1>
        <p class="mb-4">
            En <strong>Reciclapp</strong>, valoramos y respetamos tu privacidad. Este Aviso de Privacidad explica cómo
            recopilamos, utilizamos y protegemos tu información personal cuando utilizas nuestra aplicación web y móvil. Al
            utilizar nuestros servicios, aceptas las prácticas descritas en este aviso.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">1. Datos personales recopilados</h2>
        <p class="mb-4">
            Recopilamos la siguiente información personal cuando te registras y utilizas nuestros servicios:
        </p>
        <ul class="list-disc list-inside mb-4">
            <li>Nombre completo</li>
            <li>Número de teléfono</li>
            <li>Correo electrónico</li>
            <li>Fotos de perfil</li>
            <li>Ubicación</li>
        </ul>
        <p class="mb-4">
            En la app móvil, también podremos solicitar acceso a la cámara para capturar imágenes y utilizar la ubicación
            para mejorar la precisión de nuestras funciones de recolección.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">2. Finalidad del tratamiento de datos</h2>
        <p class="mb-4">
            Utilizamos tus datos personales para los siguientes fines:
        </p>
        <ul class="list-disc list-inside mb-4">
            <li>Gestionar solicitudes de recolección de residuos.</li>
            <li>Enviar notificaciones importantes relacionadas con tus solicitudes y cuenta.</li>
            <li>Facilitar la gestión de tu cuenta, incluyendo recuperación de contraseñas.</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-2">3. Uso de la Cámara y Ubicación</h2>
        <p class="mb-4">
            <strong>Cámara:</strong> La app móvil solicitará acceso a la cámara para escanear productos o capturar fotos
            relacionadas con el reciclaje.
        </p>
        <p class="mb-4">
            <strong>Ubicación:</strong> Utilizaremos tu ubicación para mejorar las solicitudes de recolección y
            proporcionarte información precisa sobre nuestros servicios.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">4. Protección y seguridad de los datos</h2>
        <p class="mb-4">
            Contamos con estrictas medidas de seguridad para proteger tu información personal contra acceso no autorizado,
            pérdida o modificación indebida. Nos aseguramos de que tu información esté protegida tanto en nuestras
            aplicaciones web como móviles.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">5. Acceso, modificación y eliminación de datos</h2>
        <p class="mb-4">
            Tienes el derecho de acceder, modificar o eliminar tus datos personales en cualquier momento. Puedes hacerlo
            directamente desde tu cuenta o poniéndote en contacto con nuestro equipo de soporte.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">6. Retención de datos</h2>
        <p class="mb-4">
            Tus datos personales serán conservados mientras mantengas una cuenta activa con nosotros. En caso de que decidas
            eliminar tu cuenta, mantendremos tus datos personales por un periodo de 12 meses después de la eliminación para
            fines de auditoría o resolución de disputas, tras lo cual serán eliminados permanentemente.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">7. No compartición de datos con terceros</h2>
        <p class="mb-4">
            Tus datos personales no serán compartidos con terceros. Toda la información recopilada es utilizada
            exclusivamente para el funcionamiento y mejora de los servicios de Reciclapp.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">8. Cambios en el Aviso de Privacidad</h2>
        <p class="mb-4">
            Este aviso puede ser actualizado ocasionalmente para reflejar cambios en nuestras prácticas o en las normativas
            legales. Te notificaremos de cualquier modificación a través de nuestros canales oficiales.
        </p>

        <p class="mb-4">
            Si tienes alguna pregunta o inquietud sobre nuestro Aviso de Privacidad, no dudes en contactarnos a través de <a
                href="mailto:info.reciclapp@gmail.com" class="text-blue-500 hover:underline">info.reciclapp@gmail.com</a>.
        </p>
    </div>
@endsection


