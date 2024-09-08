<x-app-layout>
    <div class="container mx-auto px-2">

        <table class="table-auto w-full mt-4 bg-white text-gray-900 border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Código de solicitud</th>
                    <th class="px-4 py-2 border-b">Fecha</th>
                    <th class="px-4 py-2 border-b">Peso (kg)</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($history as $entry)
                    <tr>
                        <td class="border-t px-4 py-2">{{ $entry['request_code'] }}</td>
                        <td class="border-t px-4 py-2">{{ $entry['date'] }}</td>
                        <td class="border-t px-4 py-2">{{ $entry['weight'] }} kg</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center">No hay historial de recolección disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
