<x-app-layout>
    <div class="container">
        <h1>Informes de reciclaje</h1>

        <a href="{{ route('reports.create') }}" class="btn btn-primary mb-3">Nuevo informe</a>

        @if ($reports->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Material</th>
                        <th>Cantidad Reciclada</th>
                        <th>Fecha del Informe</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->user->name }}</td>
                            <td>{{ $report->material->name }}</td>
                            <td>{{ $report->quantity }}</td>
                            <td>{{ $report->report_date }}</td>
                            <td>
                                <a href="{{ route('reports.show', $report->id) }}" class="btn btn-sm btn-info">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay informes de reciclaje disponibles.</p>
        @endif
    </div>
</x-app-layout>
