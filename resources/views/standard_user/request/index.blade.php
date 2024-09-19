<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>



    <div class="container mx-auto px-2 shadow-lg">

        <div class="flex py-1">
            <a href="{{ route('report.request') }}" target="_blank" class="text-black inline-flex items-center">
                <i class="fas fa-file-pdf mr-2 text-red-700 "></i>
            </a>
        </div>

        <table class="table-auto w-full mt-4 bg-white text-gray-900 border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Código</th>
                    <th class="px-4 py-2 border-b">Estado</th>
                    <th class="px-4 py-2 border-b">Fecha</th>
                    <th class="px-4 py-2 border-b">Hora</th>
                    <th class="px-4 py-2 border-b">Ubicación</th>
                    <th class="px-4 py-2 border-b">Fecha programada</th>
                    <th class="px-4 py-2 border-b">Fecha de creación</th>
                    <th class="px-4 py-2 border-b">Última actualización</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td class="border px-4 py-2">{{ $request->code }}</td>
                        <td class="border px-4 py-2">{{ $request->status }}</td>
                        <td class="border px-4 py-2">{{ $request->date }}</td>
                        <td class="border px-4 py-2">{{ $request->hour }}</td>
                        <td class="border px-4 py-2">{{ $request->location }}</td>
                        <td class="border px-4 py-2">{{ $request->scheduled_date }}</td>
                        <td class="border px-4 py-2">{{ $request->created_at }}</td>
                        <td class="border px-4 py-2">{{ $request->updated_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-center">No hay solicitudes disponibles.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</x-app-layout>
