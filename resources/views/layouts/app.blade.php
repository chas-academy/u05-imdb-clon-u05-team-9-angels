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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-imdb-black text-white">
    <nav class="border-b border-imdb-gray-dark">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-3">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ url('/') }}"><svg xmlns="http://www.w3.org/2000/svg" width="126" height="63"
                            viewBox="0 0 126 63" fill="none">
                            <path
                                d="M1.96875 0.984375C1.96875 0.44072 1.52803 0 0.984375 0C0.44072 0 0 0.44072 0 0.984375C0 1.52803 0.44072 1.96875 0.984375 1.96875C1.52803 1.96875 1.96875 1.52803 1.96875 0.984375Z"
                                fill="#F5C518" />
                            <path d="M15.75 49.2188H25.5938V13.7812H15.75V49.2188Z" fill="white" />
                            <path
                                d="M46.6053 13.7812L44.4022 30.3354L43.0333 21.3315C42.6365 18.4474 42.2558 15.9306 41.8913 13.7812H29.5312V49.2188H37.882L37.9144 25.8178L41.4296 49.2188H47.3747L50.7118 25.302L50.7361 49.2188H59.0625V13.7812H46.6053Z"
                                fill="white" />
                            <path
                                d="M63 49.2188V13.7812H78.3652C81.8397 13.7812 84.6562 16.5768 84.6562 20.0352V42.9648C84.6562 46.4188 81.8442 49.2188 78.3652 49.2188H63ZM74.4822 20.1591C74.0918 19.948 73.3448 19.8464 72.2583 19.8464V43.0989C73.6928 43.0989 74.5756 42.8409 74.9066 42.3016C75.2377 41.7702 75.4074 40.332 75.4074 37.9716V24.2312C75.4074 22.6289 75.348 21.605 75.2377 21.1517C75.1273 20.6984 74.8812 20.3701 74.4822 20.1591Z"
                                fill="white" />
                            <path
                                d="M103.221 22.6541H103.851C107.385 22.6541 110.25 25.4218 110.25 28.8321V43.0408C110.25 46.4528 107.386 49.2188 103.851 49.2188H103.221C101.059 49.2188 99.1468 48.1825 97.9884 46.5969L97.4214 48.7635H88.5938V13.7812H98.0129V25.1617C99.2299 23.645 101.105 22.6541 103.221 22.6541ZM101.205 39.9345V31.5376C101.205 30.1501 101.116 29.2396 100.93 28.8205C100.745 28.4013 100.004 28.1322 99.4842 28.1322C98.9647 28.1322 98.1634 28.3509 98.0076 28.7195V31.5376V40.2034V42.9335C98.1857 43.3381 98.9498 43.5633 99.4842 43.5633C100.019 43.5633 100.796 43.3454 100.96 42.9335C101.123 42.5216 101.205 41.5171 101.205 39.9345Z"
                                fill="white" />
                        </svg></a>
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

                <div class="relative mt-3 md:mt-0">
                    <input type="text" class="text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none
                    focus:shadow-outline" placeholder="Search">
                    <div class="absolute top-0">
                        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
                            <path class="heroicon-ui"
                                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen bg-imdb-black">
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-imdb-black text-white">
        <x-footer></x-footer>
    </footer>

    @yield('script')
</body>

</html>
