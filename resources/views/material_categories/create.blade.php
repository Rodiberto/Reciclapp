<x-app-layout>
    <div class="px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Crear Categoría de Material</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">¡Error!</strong>
                <span class="block sm:inline">Hay algunos problemas con su entrada.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('material_categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre de la Categoría</label>
                <input type="text" name="name" id="name" class=" border-gray-300 rounded-lg shadow-sm"
                    value="{{ old('name') }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Descripción</label>
                <textarea name="description" id="description" class=" border-gray-300 rounded-lg shadow-sm">{{ old('description') }}</textarea>
            </div>

            <div class="flex">

                <div class="flex mx-2">
                    <button type="submit" class="px-4 bg-white py-2 text-black rounded-lg">Crear</button>
                </div>

                <div class="flex">
                    <a href="{{ route('material_categories.index') }}"
                        class="px-4 py-2 bg-white text-black rounded-lg">Cancelar</a>
                </div>

            </div>



        </form>
    </div>

</x-app-layout>
