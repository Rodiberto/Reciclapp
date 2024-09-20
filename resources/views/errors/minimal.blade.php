<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Error')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background-color: #f7fafc;
            
            color: #4a5568;
           
        }
    </style>
</head>

<body class="antialiased flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto text-center">
        <div class="flex items-center justify-center">
            <div class="px-4 text-6xl text-red-600 font-bold">
                @yield('code')
            </div>
            <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                @yield('message')
            </div>
        </div>
        <div class="mt-8">
            <a href="javascript:history.back()" class="inline-block px-4 py-2 text-white bg-green-800 hover:bg-green-600 rounded-md shadow">
                Regresar
            </a>
        </div>
        
    </div>
</body>

</html>
