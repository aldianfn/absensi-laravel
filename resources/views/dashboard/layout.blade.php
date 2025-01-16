<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Mobile Hamburger Menu -->
        <button id="menuToggle" class="md:hidden md:p-4 text-black bg-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Sidebar -->
        <div id="sidebar" class="hidden md:flex flex-shrink-0 w-64 bg-white text-black">
            <div class="w-full md:p-5">
                <div class="flex flex-col justify-between h-full">
                    <div class="">
                        <h2 class="text-2xl font-bold mb-8">Sidebar</h2>
                        <ul>
                            <li><a href="{{ route('dashboard.home') }}" class="block py-2 px-4 hover:bg-gray-200">Home</a></li>
                            <li><a href="{{ route('dashboard.attendance') }}" class="block py-2 px-4 hover:bg-gray-200">Attendance</a></li>
                        </ul>
                    </div>
                    <div class="border-t border-black pt-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gray-300 hover:bg-gray-400 w-full p-3 font-semibold rounded-lg">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 md:px-6 bg-blue-100">
            @yield('dashboard')
        </div>
    </div>

    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/date.js') }}"></script>
</body>
</html>