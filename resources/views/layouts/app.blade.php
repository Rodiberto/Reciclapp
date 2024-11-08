<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reciclapp') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bg_custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_custom.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100 flex">

        @if (auth()->check())
            @if (auth()->user()->isAdmin())
                @include('layouts.admin_sidebar')
            @elseif (auth()->user()->isCollector())
                @include('layouts.collector_sidebar')
            @else
                @include('layouts.standard_user_sidebar')
            @endif
        @endif

        <div class="flex-1 overflow-y-auto">
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="">
                {{ $slot }}
            </main>

        </div>
    </div>
</body>

</html>



{{-- <body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
    

        <div class="flex-1 ml-64 p-4">
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow mb-4">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html> --}}
