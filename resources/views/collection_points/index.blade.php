<x-app-layout>
    <div class="container">
        <h1>Puntos de recolección</h1>
        <a href="{{ route('collection_points.create') }}" class="px-4 py-2 bg-white text-black rounded-lg">Agregar</a>

        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Horario</th>
                    <th>Materiales Aceptados</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collectionPoints as $point)
                    <tr>
                        <td>{{ $point->id }}</td>
                        <td>{{ $point->name }}</td>
                        <td>{{ $point->address }}</td>
                        <td>{{ $point->schedule }}</td>
                        <td>
                            @foreach ($point->materials as $material)
                                {{ $material->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('collection_points.edit', $point->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('collection_points.destroy', $point->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
