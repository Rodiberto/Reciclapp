<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="container mx-auto px-2">
        <table class="table-auto w-full mt-4 bg-white text-gray-900 border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Material</th>
                    <th class="px-4 py-2 border-b">Fecha</th>
                    <th class="px-4 py-2 border-b">Peso</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($history as $transaction)
                    <tr>
                        <td class="border-t px-4 py-2">{{ $transaction['material'] }}</td>
                        <td class="border-t px-4 py-2">{{ $transaction['date'] }}</td>
                        <td class="border-t px-4 py-2">{{ $transaction['weight'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center">No hay historial de transacciones disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
