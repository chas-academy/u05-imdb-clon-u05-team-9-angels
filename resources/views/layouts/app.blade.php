<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Page Title') - {{ config('app.name', 'IMDb') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Modal -->
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/delete-modal.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-imdb-black text-white">
    <nav class="border-b border-imdb-gray-dark">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-3">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ url('/') }}">
                        <div
                            class="text-center font-bold text-3xl w-24 px-2 py-1 bg-gradient-to-b from-imdb-purpure to-imdb-blue">
                            IMDb
                        </div>
                    </a>
                </li>
                <li class="md:ml-16">
                    <a href="/movies" class="text-lg hover:text-gray-400">Movies</a>
                </li>
                <li class="md:ml-6">
                    <a href="/actors" class="text-lg hover:text-gray-400">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col items-center md:flex-row">
                @if (Auth::check())
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <li class="md:mr-6 list-none">
                            <button
                                class="flex items-center hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                <div class="text-lg hover:text-gray-400">{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </li>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="GET" action="{{ route('dashboard') }}">
                            <x-dropdown-link :href="route('dashboard')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </form>
                        @if (auth()->user()->type == 2)
                        <form method="GET" action="{{ route('users') }}">
                            <x-dropdown-link :href="route('users')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Users') }}
                            </x-dropdown-link>
                        </form>
                        <form method="GET" action="{{ route('movie') }}">
                            <x-dropdown-link :href="route('movie')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Add new movie') }}
                            </x-dropdown-link>
                        </form>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

                @else
                <li class="list-none whitespace-nowrap"><a href="{{ route('login') }}"
                        class="text-lg hover:text-gray-400">
                        Sign in
                    </a>
                </li>
                <li class="mr-6 list-none"><a href="{{ route('register') }}"
                        class="ml-4 text-lg hover:text-gray-400">Register</a>
                </li>
                @endif


            </div>
        </div>
    </nav>

    <div class="min-h-screen bg-imdb-black">
        <!-- Page Content -->
        @yield('content')
    </div>

    <footer class="bg-imdb-black text-white">
        <x-footer></x-footer>
    </footer>

    @yield('script')
</body>

</html>