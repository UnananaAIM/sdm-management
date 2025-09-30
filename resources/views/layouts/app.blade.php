{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="h-screen flex flex-col bg-gray-100">

        <!-- Navbar -->
        <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8">
            <a href="{{ route('dashboard') }}" class="justify-center">
                <img src="logo.png" alt="Logo" class="rounded-lg">
            </a>

            <div class="relative w-1/3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Search something"
                    class="w-full bg-gray-100 border-none rounded-lg pl-10 focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gray-200 rounded-full">
                        <a href="{{ route('profile.edit') }}">
                            <img src="https://placehold.co/100x100/EFEFEF/333?text={{ Auth::user()->name }}" class="w-10 h-10 bg-gray-200 rounded-full" alt="">
                        </a>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-sm text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="font-semibold text-sm text-gray-800">
                            @if(auth()->user()->hasRole('Admin'))
                                Admin
                            @elseif(auth()->user()->hasRole('Project Director'))
                                Project Director
                            @else
                                Employee
                            @endif
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-500 bg-gray-100 hover:te-bbg-gray-3000">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </header>

        <!-- Sidebar + Main -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-20 bg-white border-r border-gray-200 flex flex-col items-center py-4">
                <nav class="flex flex-col items-center space-y-4">
                    <a href="{{ route('dashboard') }}" class="p-3 rounded-lg transition-colors {{ request()->is('dashboard') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 bg-gray-100 hover:bg-gray-300' }}">
                        <svg width="30" height="30" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="32.5" cy="32.5" r="32.5" fill="#F5F5F5"/>
                        <path d="M20.8333 33.9583H29.5833C29.9701 33.9583 30.341 33.8047 30.6145 33.5312C30.888 33.2577 31.0417 32.8868 31.0417 32.5V20.8333C31.0417 20.4466 30.888 20.0756 30.6145 19.8021C30.341 19.5286 29.9701 19.375 29.5833 19.375H20.8333C20.4466 19.375 20.0756 19.5286 19.8021 19.8021C19.5286 20.0756 19.375 20.4466 19.375 20.8333V32.5C19.375 32.8868 19.5286 33.2577 19.8021 33.5312C20.0756 33.8047 20.4466 33.9583 20.8333 33.9583ZM19.375 44.1667C19.375 44.5534 19.5286 44.9244 19.8021 45.1979C20.0756 45.4714 20.4466 45.625 20.8333 45.625H29.5833C29.9701 45.625 30.341 45.4714 30.6145 45.1979C30.888 44.9244 31.0417 44.5534 31.0417 44.1667V38.3333C31.0417 37.9466 30.888 37.5756 30.6145 37.3021C30.341 37.0286 29.9701 36.875 29.5833 36.875H20.8333C20.4466 36.875 20.0756 37.0286 19.8021 37.3021C19.5286 37.5756 19.375 37.9466 19.375 38.3333V44.1667ZM33.9583 44.1667C33.9583 44.5534 34.112 44.9244 34.3855 45.1979C34.659 45.4714 35.0299 45.625 35.4167 45.625H44.1667C44.5534 45.625 44.9244 45.4714 45.1979 45.1979C45.4714 44.9244 45.625 44.5534 45.625 44.1667V33.9583C45.625 33.5716 45.4714 33.2006 45.1979 32.9271C44.9244 32.6536 44.5534 32.5 44.1667 32.5H35.4167C35.0299 32.5 34.659 32.6536 34.3855 32.9271C34.112 33.2006 33.9583 33.5716 33.9583 33.9583V44.1667ZM35.4167 29.5833H44.1667C44.5534 29.5833 44.9244 29.4297 45.1979 29.1562C45.4714 28.8827 45.625 28.5118 45.625 28.125V20.8333C45.625 20.4466 45.4714 20.0756 45.1979 19.8021C44.9244 19.5286 44.5534 19.375 44.1667 19.375H35.4167C35.0299 19.375 34.659 19.5286 34.3855 19.8021C34.112 20.0756 33.9583 20.4466 33.9583 20.8333V28.125C33.9583 28.5118 34.112 28.8827 34.3855 29.1562C34.659 29.4297 35.0299 29.5833 35.4167 29.5833Z" fill="#7D7D7D"/>
                        </svg>
                    </a>
                    {{-- Link Project --}}
                    <a href="{{ route('project.index') }}" class="p-3 rounded-lg transition-colors {{ request()->is('project') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 bg-gray-100 hover:bg-gray-300' }}">
                        <svg width="30" height="30" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="32.5" cy="32.5" r="32.5" fill="#F5F5F5"/>
                        <path d="M45.0781 18.8281H19.9219C19.3169 18.8281 18.8281 19.3169 18.8281 19.9219V45.0781C18.8281 45.6831 19.3169 46.1719 19.9219 46.1719H45.0781C45.6831 46.1719 46.1719 45.6831 46.1719 45.0781V19.9219C46.1719 19.3169 45.6831 18.8281 45.0781 18.8281ZM27.5781 40.4297C27.5781 40.5801 27.4551 40.7031 27.3047 40.7031H24.5703C24.4199 40.7031 24.2969 40.5801 24.2969 40.4297V24.5703C24.2969 24.4199 24.4199 24.2969 24.5703 24.2969H27.3047C27.4551 24.2969 27.5781 24.4199 27.5781 24.5703V40.4297ZM34.1406 30.8594C34.1406 31.0098 34.0176 31.1328 33.8672 31.1328H31.1328C30.9824 31.1328 30.8594 31.0098 30.8594 30.8594V24.5703C30.8594 24.4199 30.9824 24.2969 31.1328 24.2969H33.8672C34.0176 24.2969 34.1406 24.4199 34.1406 24.5703V30.8594ZM40.7031 33.3203C40.7031 33.4707 40.5801 33.5938 40.4297 33.5938H37.6953C37.5449 33.5938 37.4219 33.4707 37.4219 33.3203V24.5703C37.4219 24.4199 37.5449 24.2969 37.6953 24.2969H40.4297C40.5801 24.2969 40.7031 24.4199 40.7031 24.5703V33.3203Z" fill="#7D7D7D"/>
                        </svg>
                    </a>
                    {{-- Link Task --}}
                    <a href="{{ route('task.index') }}" class="p-3 rounded-lg transition-colors {{ request()->is('task') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 bg-gray-100 hover:bg-gray-300' }}">
                        <svg width="30" height="30" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="32.5" cy="32.5" r="32.5" fill="#F5F5F5"/>
                        <path d="M35.4154 17.916H23.7487C22.1445 17.916 20.8466 19.2285 20.8466 20.8327L20.832 44.166C20.832 45.7702 22.1299 47.0827 23.7341 47.0827H41.2487C42.8529 47.0827 44.1654 45.7702 44.1654 44.166V26.666L35.4154 17.916ZM30.9529 41.2493L25.7904 36.0868L27.8466 34.0306L30.9383 37.1223L37.1216 30.9389L39.1779 32.9952L30.9529 41.2493ZM33.957 28.1243V20.1035L41.9779 28.1243H33.957Z" fill="#7D7D7D"/>
                        </svg>
                    </a>
                    {{-- Link Activity --}}
                    <a href="{{ route('activity.index') }}" class="p-3 rounded-lg transition-colors {{ request()->is('activity') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 bg-gray-100 hover:bg-gray-300' }}">
                        <svg width="30" height="30" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="32.5" cy="32.5" r="32.5" fill="#F5F5F5"/>
                        <path d="M25.1529 18.5306C27.0138 18.2812 29.3938 18.2812 32.4169 18.2812H32.5831C35.6063 18.2812 37.9863 18.2812 39.8456 18.5306C41.756 18.7873 43.2785 19.3254 44.4758 20.5242C45.6746 21.7215 46.2113 23.2454 46.4694 25.1529C46.7188 27.0138 46.7188 29.3938 46.7188 32.4169V32.5831C46.7188 35.6063 46.7188 37.9863 46.4694 39.8456C46.2127 41.756 45.6746 43.2785 44.4758 44.4758C43.2785 45.6746 41.7546 46.2113 39.8471 46.4694C37.9862 46.7188 35.6063 46.7188 32.5831 46.7188H32.4169C29.3938 46.7188 27.0138 46.7188 25.1544 46.4694C23.244 46.2127 21.7215 45.6746 20.5242 44.4758C19.3254 43.2785 18.7887 41.7546 18.5306 39.8471C18.2812 37.9862 18.2812 35.6063 18.2812 32.5831V32.4169C18.2812 29.3938 18.2812 27.0138 18.5306 25.1544C18.7873 23.244 19.3254 21.7215 20.5242 20.5242C21.7215 19.3254 23.2454 18.7887 25.1529 18.5306ZM32.1135 24.994C32.0671 24.7632 31.9474 24.5536 31.7724 24.3963C31.5973 24.239 31.3761 24.1423 31.1418 24.1207C30.9074 24.0991 30.6723 24.1537 30.4714 24.2763C30.2705 24.3989 30.1146 24.5831 30.0267 24.8015L27.3842 31.4062H25.2083C24.9183 31.4062 24.6401 31.5215 24.4349 31.7266C24.2298 31.9317 24.1146 32.2099 24.1146 32.5C24.1146 32.7901 24.2298 33.0683 24.4349 33.2734C24.6401 33.4785 24.9183 33.5938 25.2083 33.5938H28.125C28.3436 33.5936 28.5571 33.5279 28.738 33.4052C28.919 33.2825 29.059 33.1084 29.14 32.9054L30.6902 29.0306L32.8865 40.006C32.9329 40.2368 33.0526 40.4464 33.2276 40.6037C33.4027 40.761 33.6239 40.8577 33.8582 40.8793C34.0926 40.9009 34.3277 40.8463 34.5286 40.7237C34.7295 40.6011 34.8855 40.4169 34.9733 40.1985L37.6158 33.5938H39.7917C40.0817 33.5938 40.3599 33.4785 40.5651 33.2734C40.7702 33.0683 40.8854 32.7901 40.8854 32.5C40.8854 32.2099 40.7702 31.9317 40.5651 31.7266C40.3599 31.5215 40.0817 31.4062 39.7917 31.4062H36.875C36.6566 31.4063 36.4432 31.4718 36.2623 31.5942C36.0814 31.7166 35.9413 31.8904 35.86 32.0931L34.3083 35.9708L32.1135 24.994Z" fill="#7D7D7D"/>
                        </svg>
                    </a>
                    {{-- Link Presensi --}}
                    <a href="{{ route('absent.index') }}" class="p-3 rounded-lg transition-colors {{ request()->is('absent') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 bg-gray-100 hover:bg-gray-300' }}">
                        <svg width="30" height="30" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="32.5" cy="32.5" r="32.5" fill="#F5F5F5"/>
                        <path d="M25.2083 17.916C23.6612 17.916 22.1775 18.5306 21.0835 19.6246C19.9896 20.7185 19.375 22.2023 19.375 23.7493V41.2493C19.375 42.7964 19.9896 44.2802 21.0835 45.3741C22.1775 46.4681 23.6612 47.0827 25.2083 47.0827H45.625V17.916H25.2083ZM31.0417 22.291H41.25V25.2077H31.0417V22.291ZM22.2917 41.2493C22.2917 40.4758 22.599 39.7339 23.1459 39.187C23.6929 38.64 24.4348 38.3327 25.2083 38.3327H42.7083V44.166H25.2083C24.4348 44.166 23.6929 43.8587 23.1459 43.3117C22.599 42.7648 22.2917 42.0229 22.2917 41.2493Z" fill="#7D7D7D"/>
                        </svg>
                    </a>

                    @hasrole('Admin')
                        <div class="absolute bottom-4 border-t pt-4">
                            <a href="{{ route('admin.index') }}"
                                class="p-3 rounded-lg transition-colors {{ request()->is('admin') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 bg-gray-100 hover:bg-gray-300' }}">
                                <!-- Icon admin -->
                                <svg width="30" height="30" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32.5" cy="32.5" r="32.5" fill="#F5F5F5"/>
                                <path d="M32.5 16.459L19.375 22.2923V31.0423C19.375 39.1361 24.975 46.7048 32.5 48.5423C40.025 46.7048 45.625 39.1361 45.625 31.0423V22.2923L32.5 16.459ZM32.5 22.1465C33.3653 22.1465 34.2112 22.4031 34.9306 22.8838C35.6501 23.3645 36.2108 24.0478 36.542 24.8472C36.8731 25.6467 36.9597 26.5263 36.7909 27.375C36.6221 28.2237 36.2054 29.0032 35.5936 29.6151C34.9817 30.2269 34.2022 30.6436 33.3535 30.8124C32.5049 30.9812 31.6252 30.8946 30.8258 30.5635C30.0263 30.2323 29.3431 29.6716 28.8623 28.9521C28.3816 28.2326 28.125 27.3868 28.125 26.5215C28.125 25.3612 28.5859 24.2484 29.4064 23.4279C30.2269 22.6074 31.3397 22.1465 32.5 22.1465ZM32.5 33.6673C35.4167 33.6673 41.25 35.2569 41.25 38.159C40.2922 39.6029 38.992 40.7874 37.4652 41.6067C35.9385 42.4261 34.2327 42.8549 32.5 42.8549C30.7673 42.8549 29.0615 42.4261 27.5348 41.6067C26.008 40.7874 24.7078 39.6029 23.75 38.159C23.75 35.2569 29.5833 33.6673 32.5 33.6673Z" fill="#7D7D7D"/>
                                </svg>
                            </a>
                        </div>
                    @endhasrole
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>