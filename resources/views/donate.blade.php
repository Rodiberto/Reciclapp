<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 w-full max-w-md p-6 bg-white border border-gray-300 rounded-lg shadow-md">
            
            <!-- Primer div con botón Donar -->
            <div class="flex justify-center items-center">
                <a href="#" class="px-4 py-2 bg-green-800 text-white rounded-md hover:bg-green-600 transition">Donar</a>
            </div>

            <!-- Segundo div con imagen -->
            <div class="flex justify-center items-center">
                <img src="{{asset('/img/donate.png') }}" alt="Donar" class="max-w-full h-auto">
            </div>

        </div>

    </div>

</body>
</html>
