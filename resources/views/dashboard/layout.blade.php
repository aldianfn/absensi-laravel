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
    <div class="min-h-screen flex flex-col md:flex-row">
        <div id="sidebar" class="bg-white text-black w-full md:w-64 p-4 fixed inset-0 md:relative z-10 md:z-auto transform md:translate-x-0 transition-all duration-300 ease-in-out flex flex-col justify-between">
            <div class="">
                <div class="text-2xl font-semibold mb-6">My Sidebar</div>
                <ul class="space-y-4">
                    <li><a href="{{ route('dashboard.home') }}" class="hover:text-gray-400">Home</a></li>
                    <li><a href="{{ route('dashboard.attendance') }}" class="hover:text-gray-400">Attendance</a></li>
                </ul>
            </div>
            <div class="border-t border-black pt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-300 hover:bg-gray-400 w-full p-3 font-semibold rounded-lg">Logout</button>
                </form>
            </div>
        </div>
        <div class="flex-1 ml-0 bg-blue-100">
            <!-- Toggle Button (only visible on mobile) -->
            <button id="sidebarToggle" class="md:hidden bg-gray-800 text-white p-3 rounded-md">Toggle Sidebar</button>
    
            <!-- Your content goes here -->
            <div class="px-6">
                @yield('dashboard')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>