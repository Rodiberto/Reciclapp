<x-app-layout>

    <div class="container">
        <h1>Agregar material reciclable</h1>
        <form action="{{ route('materials.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Tipo</label>
                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror"
                    name="type" value="{{ old('type') }}" required>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="material_category_id">Categoría</label>
                <select id="material_category_id"
                    class="form-control @error('material_category_id') is-invalid @enderror" name="material_category_id"
                    required>
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('material_category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('material_category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</x-app-layout>
