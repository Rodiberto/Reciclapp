<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="container mx-auto px-4 py-8 max-w-lg">
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

    <form action="{{ route('admin.bags.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre de la bolsa</label>
            <input type="text" name="name" id="name" 
                class="border border-gray-300 rounded-lg shadow-sm px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-green-700"
                value="{{ old('name') }}" required>
        </div>

        <button type="submit"
            class="w-full bg-green-800 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:bg-green-700">
            Crear bolsa
        </button>
    </form>
</div>
