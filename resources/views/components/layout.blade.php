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
            <x-application-logo class="w-20 h-16 text-gray-500 fill-current" />
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
                <img src="{{ asset('images/phone.png') }}" class="cursor-pointer h-9 w-9" alt="Phone Logo">
            </a>
            <a href="https://www.instagram.com/_salmankazi_/" target="_blank" class="mx-2">
                <img src="{{ asset('images/instagram.png') }}" class="w-8 h-8 cursor-pointer" alt="Instagram Logo">
            </a>
            <a href="mailto:sskazi089@gmail.com?subject=Web Application Development" target="_blank">
                <img src="{{ asset('images/email.png') }}" class="cursor-pointer h-9 w-9" alt="Email Logo">
            </a>
        </div>
    </footer>
</body>

</html>
