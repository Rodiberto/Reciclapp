<x-app-layout>
    <div class="container">
        <h1>Crear informe de reciclaje</h1>

        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Usuario:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="material_id">Material:</label>
                <select name="material_id" id="material_id" class="form-control" required>
                    @foreach ($materials as $material)
                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Cantidad Reciclada:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="report_date">Fecha del Informe:</label>
                <input type="date" class="form-control" id="report_date" name="report_date" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar Informe</button>
        </form>
    </div>
</x-app-layout>
