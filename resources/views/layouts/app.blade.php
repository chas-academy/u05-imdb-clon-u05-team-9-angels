<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <nav class="border-b border-gray-800">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-center">
                    <li class="md:ml-16">
                        <a href="#" class="hover:text-gray-300">Movies</a>
                    </li>
                    <li class="md:ml-6">
                        <a href="#" class="hover:text-gray-300">TV Shows</a>
                    </li>
                    <li class="md:ml-6">
                        <a href="#" class="hover:text-gray-300">Actors</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </body>
</html>
