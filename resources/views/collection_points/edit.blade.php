<x-app-layout>
    <div class="container">
        <h1>Editar punto de recolección</h1>

        <form action="{{ route('collection_points.update', $collectionPoint->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $collectionPoint->name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección:</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ $collectionPoint->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="schedule">Horario:</label>
                <textarea class="form-control" id="schedule" name="schedule" rows="3">{{ $collectionPoint->schedule }}</textarea>
            </div>
            <div class="form-group">
                <label for="materials">Materiales aceptados:</label><br>
                @foreach ($materials as $material)
                    <input type="checkbox" id="material_{{ $material->id }}" name="materials[]" value="{{ $material->id }}" {{ $collectionPoint->materials->contains($material->id) ? 'checked' : '' }}>
                    <label for="material_{{ $material->id }}">{{ $material->name }}</label><br>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-app-layout>
