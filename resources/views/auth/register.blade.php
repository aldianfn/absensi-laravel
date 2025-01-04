<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col items-center justify-center min-h-screen w-full">
        @if (session('success'))
            {{ session('success') }}
        @endif

        {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif --}}
        <div class="bg-yellow-200 px-7 py-5 rounded-md w-1/3">
            <h1 class="text-4xl font-bold text-center mb-5">Register</h1>
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="name">Name</label>
                    <input class="px-2 py-1 rounded-sm" type="text" name="name" required>
                </div>
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="email">Email</label>
                    <input class="px-2 py-1 rounded-sm" type="email" name="email" required>
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </div>
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="password">Password</label>
                    <input class="px-2 py-1 rounded-sm" type="password" name="password" required>
                    @if ($errors->has('password'))
                        {{ $errors->first('password') }}
                    @endif
                </div>
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="password_confirmation">Password Confirmation</label>
                    <input class="px-2 py-1 rounded-sm" type="password" name="password_confirmation" required>
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 w-full py-2 rounded-md mt-5 mb-3">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
