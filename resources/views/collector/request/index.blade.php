<x-app-layout>
    <div class="container mx-auto p-2">
        <div class="flex py-1">
            <a href="{{ route('report.collector') }}" target="_blank" class="text-black inline-flex items-center">
                <i class="fas fa-file-pdf mr-2 text-red-700 "></i>
            </a>
        </div>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Código</th>
                    <th class="py-2 px-4 border-b">Estado</th>
                    <th class="py-2 px-4 border-b">Total aproximado (kg)</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                    <th class="py-2 px-4 border-b">Hora</th>
                    <th class="py-2 px-4 border-b">Ubicación</th>
                    <th class="py-2 px-4 border-b">Detalles</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $request['code'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $request['status'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $request['total_weight'] }} kg</td>
                        <td class="py-2 px-4 border-b">{{ $request->date }}</td>
                        <td class="py-2 px-4 border-b">{{ $request->hour }}</td>
                        <td class="py-2 px-4 border-b">{{ $request->location }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('requests_collector.show', $request->id) }}"
                                class="text-green-700 hover:underline">Ver detalles</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-2 px-4 text-center">No hay solicitudes de recolección disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

{{-- <x-app-layout>

    <div class="container mx-auto p-2">

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Código</th>
                    <th class="py-2 px-4 border-b">Estado</th>
                    <th class="py-2 px-4 border-b">Total aproximado (kg)</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                    <th class="py-2 px-4 border-b">Hora</th>
                    <th class="py-2 px-4 border-b">Ubicación</th>
                    <th class="py-2 px-4 border-b">Detalles</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $requests = [
                        [
                            'id' => 1,
                            'code' => 'REQ12345',
                            'status' => 'Pendiente',
                            'total_weight' => 15.5,
                            'date' => '2024-09-05',
                            'hour' => '10:30 AM',
                            'location' => 'Calle Falsa 123, Ciudad'
                        ],
                        [
                            'id' => 2,
                            'code' => 'REQ67890',
                            'status' => 'Completada',
                            'total_weight' => 12.0,
                            'date' => '2024-09-04',
                            'hour' => '02:00 PM',
                            'location' => 'Avenida Siempre Viva 742, Ciudad'
                        ],
                        [
                            'id' => 3,
                            'code' => 'REQ54321',
                            'status' => 'En proceso',
                            'total_weight' => 8.75,
                            'date' => '2024-09-03',
                            'hour' => '11:15 AM',
                            'location' => 'Calle Principal 456, Ciudad'
                        ],
                    ];
                @endphp

                @foreach ($requests as $request)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $request['code'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $request['status'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $request['total_weight'] }} kg</td>
                        <td class="py-2 px-4 border-b">{{ $request['date'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $request['hour'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $request['location'] }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('requests_collector.show', $request['id']) }}"
                                class="text-green-700 hover:underline">Ver detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout> --}}
