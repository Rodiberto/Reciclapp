<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <style>
            #modalContent {
                max-height: 80vh;
                overflow-y: auto;
            }
        </style>
    </head>

    <div class="flex h-screen">

        <div class="p-2 flex-1 bg-gray-100">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6 mt-4 mb-6">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="flex justify-center items-center text-2xl font-semibold text-gray-800">
                            Aprende a reciclar
                        </h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mt-4">
                            <div id="plasticCard" class="bg-gray-50 p-4 rounded-lg flex flex-col items-center">
                                <img src="{{ asset('/img/learn/plastico.jpg') }}" alt="Plástico"
                                    class="w-20 h-20 mb-2 rounded-lg">
                                <span class="text-sm font-semibold text-gray-800">Plástico</span>
                            </div>

                            <div id="glassCard" class="bg-gray-50 p-4 rounded-lg flex flex-col items-center">
                                <img src="{{ asset('/img/learn/vidrio.jpg') }}" alt="Vidrio"
                                    class="w-20 h-20 mb-2 rounded-lg">
                                <span class="text-sm font-semibold text-gray-800">Vidrio</span>
                            </div>

                            <div id="aluminumCard" class="bg-gray-50 p-4 rounded-lg flex flex-col items-center">
                                <img src="{{ asset('/img/learn/aluminio.jpg') }}" alt="Aluminio"
                                    class="w-20 h-20 mb-2 rounded-lg">
                                <span class="text-sm font-semibold text-gray-800">Aluminio</span>
                            </div>

                            <div id="cardboardCard" class="bg-gray-50 p-4 rounded-lg flex flex-col items-center">
                                <img src="{{ asset('/img/learn/carton.jpg') }}" alt="Cartón"
                                    class="w-20 h-20 mb-2 rounded-lg">
                                <span class="text-sm font-semibold text-gray-800">Cartón</span>
                            </div>

                            <div id="paperCard" class="bg-gray-50 p-4 rounded-lg flex flex-col items-center">
                                <img src="{{ asset('/img/learn/papel.jpg') }}" alt="Papel"
                                    class="w-20 h-20 mb-2 rounded-lg">
                                <span class="text-sm font-semibold text-gray-800">Papel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">


                {{-- <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900"></div>

                    <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Materiales reciclados</p>
                    <div class="chart-container">
                        <canvas id="myChart" width="200" height="150"></canvas>
                    </div>

                </div> --}}
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Materiales
                            reciclados</p>

                        <form id="intervalForm">
                            <label for="interval">Selecciona el intervalo:</label>
                            <select id="interval" name="interval">
                                <option value="week" {{ $interval === 'week' ? 'selected' : '' }}>Semana</option>
                                <option value="month" {{ $interval === 'month' ? 'selected' : '' }}>Mes</option>
                            </select>
                            <button type="submit">Actualizar</button>
                        </form>

                        <div>
                            <canvas id="myChart" width="200" height="200"></canvas>
                        </div>


                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mb-6">



                <!-- Sección de Solicitudes -->
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Solicitudes</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @if ($requests->isEmpty())
                                <p class="col-span-3 text-center text-sm font-semibold text-gray-800">No tienes ninguna
                                    solicitud.
                                </p>
                            @else
                                @foreach ($requests as $request)
                                    <div class="flex flex-col items-center bg-gray-50 rounded-lg p-4 hover:bg-gray-100">
                                        <div class="text-center text-sm">
                                            <p class="font-bold">{{ $request->code }}</p>
                                            <p class="text-gray-600">{{ $request->status }}</p>
                                            <p class="text-gray-600">
                                                {{ $request->scheduled_date->format('d M Y, H:i') }}</p>
                                            <p class="text-gray-600">{{ $request->location }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sección de Historial -->
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="flex justify-start items-center text-sm font-semibold text-gray-800">Historial</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                            @if ($history->isEmpty())
                                <p class="col-span-3 text-center text-sm font-semibold text-gray-800">No tienes ningún
                                    historial disponible.
                                </p>
                            @else
                                @foreach ($history as $record)
                                    <div class="flex flex-col items-center bg-gray-50 rounded-lg p-4 hover:bg-gray-100">
                                        <div class="text-center text-sm">
                                            <p class="font-semibold text-gray-800">{{ $record->action }}</p>
                                            <p class="text-gray-600">{{ $record->date->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>




    <div id="modal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden overflow-auto">

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-5xl mx-4 my-6 overflow-auto">

            <div class="p-4 flex justify-between items-center">
                <button id="closeModal"
                    class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-center justify-center mb-4">
                <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-100">Información del Material</h1>
            </div>

            <div id="modalContent" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg relative overflow-auto">

            </div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modalContent');

            document.querySelectorAll('[id$="Card"]').forEach(card => {
                card.addEventListener('click', function() {
                    const contentId = this.id.replace('Card', 'Content');
                    const content = document.getElementById(contentId).innerHTML;

                    modalContent.innerHTML = content;
                    modal.classList.remove('hidden');
                });
            });

            document.getElementById('closeModal').addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', function(event) {
                if (event.target === this) {
                    this.classList.add('hidden');
                }
            });
        });
    </script>


</x-app-layout>



<div id="plasticContent" class="hidden py-8">


    <div class="flex justify-center items-center">
        <img src="{{ asset('/img/learn/plastico.jpg') }}" alt="Plástico" class="rounded-lg mb-4 h-40 w-40">
    </div>

    <div>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            Elaborados a partir de compuestos derivados del petróleo, el gas natural o el carbón, estos plásticos
            cuentan con numerosos tipos, pero hay cuatro que podrían denominarse como principales:
        </p>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Tipos existentes</h2>

    <div class="space-y-4">
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/polietileno.jpg') }}" alt="Polietileno" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Polietileno (PE):</strong> Presente en bolsas, láminas y películas de plástico, contenedores,
                microesferas de cosméticos y productos abrasivos.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/poliester.jpg') }}" alt="Poliéster" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Polyester (PET):</strong> Lo incluyen las botellas, los envases o la ropa.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/polipropileno.jpg') }}" alt="Polipropileno" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Polipropileno (PP):</strong> Forma parte de los electrodomésticos o las piezas de los vehículos.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/pvc.jpg') }}" alt="PVC" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Cloruro de polivinilo (PVC):</strong> Presente en las tuberías, las válvulas o las ventanas.
            </p>
        </div>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Preparación</h2>

    <ol class="list-decimal pl-5 text-lg text-gray-700 dark:text-gray-300 mb-4 space-y-4">
        <li>
            <div class="flex items-center">
                Retirar etiquetas
            </div>
            <img src="{{ asset('/img/learn/retirar_etiquetas.png') }}" alt="Retirar etiquetas"
                class="h-30 w-40 ml-2">
            <span class="ml-2 block">Separa etiquetas y tapas de los envases.</span>
        </li>

        <li>
            <div class="flex items-center">
                Limpiar los envases
            </div>
            <span class="ml-2 block">Enjuaga bien para eliminar restos de alimentos y líquidos.</span>
        </li>

        <li>
            <div class="flex items-center">
                Aplana los envases
            </div>
            <span class="ml-2 block">Aplasta botellas y recipientes para ahorrar espacio.</span>
        </li>

        <li>
            <div class="flex items-center">
                Clasifica según el tipo de plástico
            </div>
            <span class="ml-2 block">Separa los plásticos por categorías (PET, HDPE, etc.).</span>
        </li>

        <li>
            <div class="flex items-center">
                Coloca en la bolsa de plásticos
            </div>
        </li>
    </ol>

</div>

<div id="glassContent" class="hidden py-8">
    <div class="flex justify-center items-center">
        <img src="{{ asset('/img/learn/vidrio.jpg') }}" alt="Vidrio" class="rounded-lg mb-4 h-40 w-40">
    </div>

    <div>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            El vidrio es un material inorgánico, duro, frágil, transparente y amorfo, que se utiliza principalmente en
            la producción de envases y ventanas. Existen diferentes tipos de vidrio dependiendo de su composición y uso.
        </p>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Tipos existentes</h2>

    <div class="space-y-4">
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/vidrio_soda_cal.jpg') }}" alt="Vidrio Soda-Cal" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Vidrio Soda-Cal:</strong> Es el más común, utilizado en la fabricación de botellas, vasos,
                ventanas, y recipientes. Es reciclable casi al 100%.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/vidrio_borosilicato.jpg') }}" alt="Vidrio Borosilicato"
                class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Vidrio de Borosilicato:</strong> Utilizado en laboratorios y en la fabricación de utensilios de
                cocina debido a su resistencia a altas temperaturas.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/vidrio_plomo.jpg') }}" alt="Vidrio de Plomo" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Vidrio de Plomo (Cristal):</strong> Usado principalmente en artículos de lujo, como vasos y
                adornos, tiene una mayor densidad y brillo.
            </p>
        </div>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Preparación</h2>

    <ol class="list-decimal pl-5 text-lg text-gray-700 dark:text-gray-300 mb-4 space-y-4">
        <li>
            <div class="flex items-center">
                Retirar etiquetas y tapas
            </div>
            <span class="ml-2 block">Separa etiquetas y tapas de los envases de vidrio.</span>
        </li>

        <li>
            <div class="flex items-center">
                Limpiar los envases
            </div>
            <span class="ml-2 block">Enjuaga bien los envases de vidrio para eliminar restos de alimentos y
                líquidos.</span>
        </li>

        <li>
            <div class="flex items-center">
                Clasifica según el color
            </div>
            <span class="ml-2 block">Separa el vidrio según su color: transparente, verde, o ámbar.</span>
        </li>

        <li>
            <div class="flex items-center">
                Maneja con cuidado
            </div>
            <span class="ml-2 block">El vidrio roto debe manejarse con cuidado para evitar accidentes y puede tener un
                proceso de reciclaje diferente.</span>
        </li>

        <li>
            <div class="flex items-center">
                Coloca en la bolsa o contenedor de vidrio
            </div>
        </li>
    </ol>
</div>


<div id="aluminumContent" class="hidden py-8">
    <div class="flex justify-center items-center">
        <img src="{{ asset('/img/learn/aluminio.jpg') }}" alt="Aluminio" class="rounded-lg mb-4 h-40 w-40">
    </div>

    <div>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            El aluminio es un metal ligero, duradero y altamente reciclable, utilizado principalmente en la fabricación
            de envases, latas, y productos de construcción. Es uno de los materiales más reciclados en todo el mundo.
        </p>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Usos comunes</h2>

    <div class="space-y-4">
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/latas_aluminio.jpg') }}" alt="Latas de Aluminio" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Latas:</strong> Las latas de bebidas son uno de los productos de aluminio más reciclados, ya que
                pueden ser recicladas infinitamente sin perder calidad.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/envases_aluminio.jpg') }}" alt="Envases de Aluminio"
                class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Envases:</strong> Utilizado en envases de alimentos, bandejas y envolturas por su capacidad para
                proteger los productos de la luz y el oxígeno.
            </p>
        </div>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Preparación</h2>

    <ol class="list-decimal pl-5 text-lg text-gray-700 dark:text-gray-300 mb-4 space-y-4">
        <li>
            <div class="flex items-center">
                Limpiar las latas y envases
            </div>
            <span class="ml-2 block">Enjuaga bien las latas y envases de aluminio para eliminar restos de alimentos y
                bebidas.</span>
        </li>

        <li>
            <div class="flex items-center">
                Aplana las latas
            </div>
            <span class="ml-2 block">Aplasta las latas para reducir su volumen y facilitar el reciclaje.</span>
        </li>

        <li>
            <div class="flex items-center">
                Evita mezclar con otros materiales
            </div>
            <span class="ml-2 block">Asegúrate de no mezclar el aluminio con otros materiales no reciclables, como
                plásticos o papel.</span>
        </li>

        <li>
            <div class="flex items-center">
                Coloca en el contenedor de aluminio
            </div>
        </li>
    </ol>
</div>


<div id="cardboardContent" class="hidden py-8">
    <div class="flex justify-center items-center">
        <img src="{{ asset('/img/learn/carton.jpg') }}" alt="Cartón" class="rounded-lg mb-4 h-40 w-40">
    </div>

    <div>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            El cartón es un material derivado del papel que se utiliza principalmente para embalajes, cajas y otros
            productos de almacenamiento. Es un material reciclable y muy versátil.
        </p>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Usos comunes</h2>

    <div class="space-y-4">
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/cajas_carton.jpg') }}" alt="Cajas de Cartón" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Cajas:</strong> Las cajas de cartón se utilizan ampliamente para embalajes, mudanzas y
                almacenamiento de productos.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/tubos_carton.jpg') }}" alt="Tubos de Cartón" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Tubos:</strong> Utilizados en la fabricación de rollos de papel, envases y elementos de
                construcción.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/papel_carton.jpg') }}" alt="Papel de Cartón" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Papel Cartón:</strong> Usado para hacer productos de papelería y materiales escolares, así como
                en el diseño de carteles y presentaciones.
            </p>
        </div>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Preparación</h2>

    <ol class="list-decimal pl-5 text-lg text-gray-700 dark:text-gray-300 mb-4 space-y-4">
        <li>
            <div class="flex items-center">
                Retirar cintas y etiquetas
            </div>
            <span class="ml-2 block">Elimina cualquier cinta adhesiva, etiquetas u otros materiales no
                reciclables.</span>
        </li>

        <li>
            <div class="flex items-center">
                Aplanar las cajas
            </div>
            <span class="ml-2 block">Dobla y aplana las cajas de cartón para reducir el espacio que ocupan.</span>
        </li>

        <li>
            <div class="flex items-center">
                Evitar el cartón mojado o contaminado
            </div>
            <span class="ml-2 block">No mezcles cartón que esté mojado, grasoso o contaminado con otros
                materiales.</span>
        </li>

        <li>
            <div class="flex items-center">
                Coloca en el contenedor de cartón
            </div>
        </li>
    </ol>
</div>


<div id="paperContent" class="hidden py-8">
    <div class="flex justify-center items-center">
        <img src="{{ asset('/img/learn/papel.jpg') }}" alt="Papel" class="rounded-lg mb-4 h-40 w-40">
    </div>

    <div>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            El papel es un material hecho de fibras vegetales, principalmente madera, que se utiliza para una variedad
            de propósitos, incluyendo impresión, embalaje y escritura. Es ampliamente reciclable y es importante
            separarlo correctamente para su reciclaje.
        </p>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Usos comunes</h2>

    <div class="space-y-4">
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/hojas_papel.jpg') }}" alt="Hojas de Papel" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Hojas de papel:</strong> Utilizadas para impresión, escritura y fotocopias.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/revistas.jpg') }}" alt="Revistas y Periódicos" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Revistas y periódicos:</strong> Comúnmente reciclados para hacer nuevo papel y otros productos.
            </p>
        </div>
        <div class="flex items-start">
            <img src="{{ asset('/img/learn/cajas_papel.jpg') }}" alt="Cajas de Papel" class="h-50 w-60 mr-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <strong>Cajas y embalajes de papel:</strong> Usados para envíos y almacenamiento, son fáciles de
                reciclar si están limpios.
            </p>
        </div>
    </div>

    <h2 class="py-2 text-2xl font-semibold mb-3 text-gray-800 dark:text-gray-100">Preparación</h2>

    <ol class="list-decimal pl-5 text-lg text-gray-700 dark:text-gray-300 mb-4 space-y-4">
        <li>
            <div class="flex items-center">
                Separar papeles limpios de sucios
            </div>
            <span class="ml-2 block">Asegúrate de separar el papel limpio (sin grasa ni comida) del sucio antes de
                reciclar.</span>
        </li>

        <li>
            <div class="flex items-center">
                Retirar grapas y clips
            </div>
            <span class="ml-2 block">Quita grapas, clips y otros objetos metálicos que puedan estar sujetos al
                papel.</span>
        </li>

        <li>
            <div class="flex items-center">
                No mezclar con otros materiales
            </div>
            <span class="ml-2 block">Evita mezclar el papel con otros materiales como plástico o vidrio.</span>
        </li>

        <li>
            <div class="flex items-center">
                Coloca en el contenedor de papel
            </div>
        </li>
    </ol>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- <script>
    // Datos estáticos para probar
    var materials = ['Plástico', 'Cartón', 'Vidrio', 'Aluminio', 'Papel']; // Etiquetas (materiales reciclados)
    var quantities = [120, 80, 45, 60, 90]; // Cantidades recicladas en kg

    // Obtener el contexto del canvas donde se dibujará la gráfica
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfica: bar, line, pie, etc.
        data: {
            labels: materials, // Etiquetas para cada barra (Materiales reciclados)
            datasets: [{
                label: 'Cantidad reciclada (kg)', // Etiqueta para el gráfico
                data: quantities, // Cantidades recicladas para cada material
                backgroundColor: [
                    'rgba(75, 192, 192, 1)', // Color sólido
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)', // Color del borde
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Comenzar el eje Y en 0
                }
            }
        }
    });
</script> --}}
<script>
    document.getElementById('intervalForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional
        var interval = document.getElementById('interval').value;
        var url = `{{ route('standard_user.dashboard') }}?interval=${interval}`;
        window.location.href = url;
    });

    // Asegúrate de que los datos se inyecten correctamente en el gráfico
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfica: bar, line, pie, etc.
        data: {
            labels: {!! json_encode($materials) !!}, // Etiquetas para cada barra (Materiales reciclados)
            datasets: [{
                label: 'Cantidad reciclada (kg)', // Etiqueta para el gráfico
                data: {!! json_encode($quantities) !!}, // Cantidades recicladas para cada material
                backgroundColor: [
                    'rgba(75, 192, 192, 1)', // Color de fondo sólido para cada barra
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)', // Color del borde sólido para cada barra
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Comenzar el eje Y en 0
                }
            }
        }
    });
</script>
