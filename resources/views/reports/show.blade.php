<x-app-layout>
    <div class="container">
        <h1>Informe de reciclaje</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Usuario: {{ $report->user->name }}</h5>
                <p class="card-text">Material: {{ $report->material->name }}</p>
                <p class="card-text">Cantidad Reciclada: {{ $report->quantity }}</p>
                <p class="card-text">Fecha del Informe: {{ $report->report_date }}</p>
            </div>
        </div>
        
        <a href="{{ route('reports.index') }}" class="btn btn-primary mt-3">Regresar</a>
    </div>
</x-app-layout>
