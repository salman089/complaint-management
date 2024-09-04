<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->
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
            <x-application-logo class="w-30 h-10" />
        </div>
        <nav>
            <div class="flex space-x-4">
                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.home') }}" class="rounded-md px-4 py-2 text-gray-700  hover:text-black hover:bg-gray-500 transition">
                            Admin Dashboard
                        </a>
                    @elseif (auth()->user()->hasRole('employee'))
                        <a href="{{ route('employee.home') }}" class="rounded-md px-4 py-2 text-gray-700  hover:text-black hover:bg-gray-500 transition">
                            Employee Dashboard
                        </a>
                    @elseif (auth()->user()->hasRole('customer'))
                        <a href="{{ route('customer.home') }}" class="rounded-md px-4 py-2 text-gray-700  hover:text-black hover:bg-gray-500 transition">
                            Customer Dashboard
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-4 py-2 text-gray-700  hover:text-black hover:bg-gray-500 transition">
                            Dashboard
                        </a>
                    @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="rounded-md px-4 py-2 text-gray-700 hover:bg-gray-200 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-md px-4 py-2 bg-gray-700 text-white hover:text-black hover:bg-gray-400 transition">
                            Register
                        </a>
                    @endif
                @endguest
            </div>
        </nav>
    </header>

    <main class="p-6 flex justify-center items-center">
        {{ $slot }}
    </main>

    <footer class="p-4">
        <p>Shaukat Electric Works</p>
        <p>&copy; {{ date('Y') }}. All rights reserved.</p>
    </footer>
</body>

</html>
