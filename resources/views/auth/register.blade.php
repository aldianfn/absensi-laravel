@extends('auth.main')

@section('auth')
    <div class="flex flex-col items-center justify-center min-h-screen w-full bg-gradient-to-r from-cyan-500 to-blue-500">
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
        <div class="bg-white px-7 py-5 rounded-md w-1/3">
            <h1 class="text-4xl font-bold text-center mb-5">Register</h1>
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="name">Name</label>
                    <input class="px-2 py-1 rounded-sm border-b border-black focus:outline-none" type="text" name="name"
                        required>
                </div>
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="email">Email</label>
                    <input class="px-2 py-1 rounded-sm border-b border-black focus:outline-none" type="email"
                        name="email" required>
                    @if ($errors->has('email'))
                        <span class="text-sm text-red-600">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="password">Password</label>
                    <input class="px-2 py-1 rounded-sm border-b border-black focus:outline-none" type="password"
                        name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-sm text-red-600">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="flex flex-col mb-3">
                    <label class="mb-1" for="password_confirmation">Password Confirmation</label>
                    <input class="px-2 py-1 rounded-sm border-b border-black focus:outline-none" type="password"
                        name="password_confirmation" required>
                </div>
                <button type="submit"
                    class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white hover:bg-blue-600 w-full py-2 rounded-md mt-5 mb-3">Register</button>
                <p class="text-center text-sm">Already have account? <a href="{{ route('login') }}"
                        class="text-blue-700 hover:text-blue-800">Login
                        here</a></p>
            </form>
        </div>
    </div>
@endsection
