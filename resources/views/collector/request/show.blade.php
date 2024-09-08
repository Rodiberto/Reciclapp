
<x-app-layout>
    <div class="container mx-auto p-2">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <p><strong>Código:</strong> {{ $request->code }}</p>
            <p><strong>Estado:</strong> {{ $request->status }}</p>
            <p><strong>Total aproximado (kg):</strong> {{ $request->bags->sum('weight') }}</p>
            <p><strong>Fecha:</strong> {{ $request->date }}</p>
            <p><strong>Hora:</strong> {{ $request->hour }}</p>
            <p><strong>Ubicación:</strong> {{ $request->location }}</p>
    
            <h2 class="text-xl font-semibold mt-4">Detalles del usuario</h2>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Teléfono:</strong> {{ $user->phone }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
        </div>
        <div class="mt-4">
            <a href="{{ route('requests_collector.index') }}"
               class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Regresar
            </a>
        </div>
    </div>
</x-app-layout>



{{-- <x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Detalles de la solicitud</h1>
    
        @php
            $request = [
                'code' => 'REQ12345',
                'status' => 'Pendiente',
                'bags' => [
                    ['weight' => 5],
                    ['weight' => 10.5]
                ],
                'date' => '2024-09-05',
                'hour' => '10:30 AM',
                'location' => 'Calle 123, Ciudad'
            ];

            $user = [
                'name' => 'Juan Pérez',
                'phone' => '555-1234',
                'email' => 'juan.perez@example.com'
            ];
        @endphp

        <div class="bg-white p-4 rounded-lg shadow-md">
            <p><strong>Código:</strong> {{ $request['code'] }}</p>
            <p><strong>Estado:</strong> {{ $request['status'] }}</p>
            <p><strong>Total aproximado (kg):</strong> {{ collect($request['bags'])->sum('weight') }} kg</p>
            <p><strong>Fecha:</strong> {{ $request['date'] }}</p>
            <p><strong>Hora:</strong> {{ $request['hour'] }}</p>
            <p><strong>Ubicación:</strong> {{ $request['location'] }}</p>
    
            <h2 class="text-xl font-semibold mt-4">Detalles del usuario</h2>
            <p><strong>Nombre:</strong> {{ $user['name'] }}</p>
            <p><strong>Teléfono:</strong> {{ $user['phone'] }}</p>
            <p><strong>Correo electrónico:</strong> {{ $user['email'] }}</p>
        </div>
    </div>
</x-app-layout> --}}
