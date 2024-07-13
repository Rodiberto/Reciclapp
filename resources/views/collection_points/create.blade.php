<x-app-layout>
    <div class="container">
        <h1>Agregar punto de recolección</h1>

        <form action="{{ route('collection_points.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección:</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="schedule">Horario:</label>
                <textarea class="form-control" id="schedule" name="schedule" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="materials">Materiales aceptados:</label><br>
                @foreach ($materials as $material)
                    <input type="checkbox" id="material_{{ $material->id }}" name="materials[]" value="{{ $material->id }}">
                    <label for="material_{{ $material->id }}">{{ $material->name }}</label><br>
                @endforeach
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</x-app-layout>
