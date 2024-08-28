<h1>Lista de Bolsas</h1>

<a href="{{ route('admin.bags.create') }}">Agregar Nueva Bolsa</a>

<table>
    <thead>
        <tr>
            <th>Nombre de la Bolsa</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bags as $bag)
            <tr>
                <td>{{ $bag->name }}</td>
                <td>
                    <a href="{{ route('admin.bags.edit', $bag->id) }}">Editar</a>
                    <form action="{{ route('admin.bags.destroy', $bag->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('¿Estás seguro de eliminar esta bolsa?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
