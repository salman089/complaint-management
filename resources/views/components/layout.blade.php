<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            line-height: 1.5;
            color: #333;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo {
            margin-right: auto;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <x-application-logo class="w-24 h-16 text-gray-500 fill-current" />
        </div>
        <nav>
            <div class="flex space-x-4">
                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.home') }}"
                            class="px-4 py-2 text-gray-700 transition rounded-md hover:text-black hover:bg-gray-500">
                            Admin Dashboard
                        </a>
                    @elseif (auth()->user()->hasRole('employee'))
                        <a href="{{ route('employee.home') }}"
                            class="px-4 py-2 text-gray-700 transition rounded-md hover:text-black hover:bg-gray-500">
                            Employee Dashboard
                        </a>
                    @elseif (auth()->user()->hasRole('customer'))
                        <a href="{{ route('customer.home') }}"
                            class="px-4 py-2 text-gray-700 transition rounded-md hover:text-black hover:bg-gray-500">
                            Customer Dashboard
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 text-gray-700 transition rounded-md hover:text-black hover:bg-gray-500">
                            Dashboard
                        </a>
                    @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 transition rounded-md hover:bg-gray-200">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 text-white transition bg-gray-700 rounded-md hover:text-black hover:bg-gray-400">
                            Register
                        </a>
                    @endif
                @endguest
            </div>
        </nav>
    </header>

    <main class="flex items-center justify-center p-2">
        {{ $slot }}
    </main>

    <footer class="p-2">
        <p><strong>Opening Hours</strong></p>
        <p><strong>Monday:</strong> 09:00 am to 01:30 pm</p>
        <p><strong>Tuesday - Sunday:</strong> 09:00 am to 06:00 pm</p>
        <hr class="my-4 border-gray-300">

        <p>&copy; 1988 - {{ date('Y') }}. All rights reserved.</p>
        <p>Shaukat Electric Works</p>
        <p>Kalkai Kond, Dapoli</p>
        <p>Designed and developed by Salman Shawkat Kazi</span>

        <div class="flex items-center justify-center p-2">
            <a href="tel:+919373486979" >
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 18 20">
                    <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
                </svg>
            </a>
            <a href="https://www.instagram.com/_salmankazi_/" target="_blank" class="mx-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 20 18">
                    <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
                </svg>
            </a>
            <a href="mailto:sskazi089@gmail.com?subject=Web Application Development" target="_blank">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 20 20">
                    <path d="M19.728 10.686c-2.38 2.256-6.153 3.381-9.875 3.381-3.722 0-7.4-1.126-9.571-3.371L0 10.437V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7.6l-.272.286Z"/>
                    <path d="m.135 7.847 1.542 1.417c3.6 3.712 12.747 3.7 16.635.01L19.605 7.9A.98.98 0 0 1 20 7.652V6a2 2 0 0 0-2-2h-3V3a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v1H2a2 2 0 0 0-2 2v1.765c.047.024.092.051.135.082ZM10 10.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5ZM7 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H7V3Z"/>
                </svg>
            </a>
        </div>
    </footer>
</body>

</html>
