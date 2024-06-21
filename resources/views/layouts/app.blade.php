<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reciclapp') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">

        <!-- Sidebar según el rol del usuario -->
        @if (auth()->check())
            @if (auth()->user()->isAdmin())
                @include('layouts.admin_sidebar')
            @elseif (auth()->user()->isCollector())
                @include('layouts.collector_sidebar')
            @else
                @include('layouts.standard_user_sidebar')
            @endif
        @endif

        <!-- Main Content -->
        <div class="flex-1">
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="p-8">
                {{ $slot }}
            </main>

        </div>
    </div>
</body>
</html>
