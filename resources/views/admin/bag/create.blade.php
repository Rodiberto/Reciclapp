<form action="{{ route('admin.bags.store') }}" method="POST">
    @csrf
    <label for="name">Nombre de la bolsa:</label>
    <input type="text" id="name" name="name" required>

    <button type="submit">Crear Bolsa</button>
</form>
