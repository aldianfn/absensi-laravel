@extends('dashboard.layout')

@section('dashboard')
<div class="flex">
    <h1>Dashboard</h1>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-blue-400">Logout</button>
    </form>
</div>
<a href="{{ route('dashboard.attendance') }}">Kehadiran</a>
@endsection