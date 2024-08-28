<h1>Editar Bolsa</h1>

<form action="{{ route('admin.bags.update', $bag->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nombre de la bolsa:</label>
    <input type="text" id="name" name="name" value="{{ $bag->name }}" required>

    <button type="submit">Actualizar Bolsa</button>
</form>