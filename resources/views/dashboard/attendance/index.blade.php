@extends('dashboard.layout')

@section('dashboard')
    <div class="flex justify-between items-center">
        <div class="my-4 flex">
            <h1 class="text-2xl font-semibold">{{ $title }}</h1>
            <span class="text-xl mx-4">|</span>
            <div id="clock" name="clock" class="text-2xl font-semibold"></div>
            {{-- <div id="date" name="date" class="text-2xl font-semibold"></div> --}}
        </div>
        <div class="">
            Atteend
        </div>
    </div>

    <h1 class="text-3xl font-semibold">Attendance page</h1>

    
    <div class="flex gap-4 my-6 bg-white px-6 py-3 relative overflow-x-auto shadow-md sm:rounded-lg">
        <form id="check-in-form" action="{{ route('dashboard.attendance.checkIn') }}" method="POST">
            @csrf
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            {{-- <input type="file" id="photo" name="photo" accept="image/*" capture="camera"> --}}
            <button type="submit" id="check-in-btn" class="{{ $checkedInStatus ? 'bg-gray-200' : 'bg-blue-400' }} py-2 mt-2 w-32" {{ $checkedInStatus ? 'disabled' : '' }}>Check In</button>
        </form>
        <form id="check-out-form" action="{{ route('dashboard.attendance.checkOut') }}" method="POST">
            @csrf
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">

            <button type="submit" id="check-out-btn" class="{{ $checkedOutStatus || !$checkedInStatus ? 'bg-gray-200' : 'bg-blue-400' }} py-2 mt-2 w-32" {{ $checkedOutStatus ? 'disabled' : '' }}>Check Out</button>
        </form>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Check In
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Check Out
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Location
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendanceLists as $attendance)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $attendance->date }}
                        </td>
                        <td  class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $attendance->check_in }}
                        </td>
                        <td  class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $attendance->check_out }}
                        </td>
                        <td  class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $attendance->location }}
                        </td>
                        <td  class="px-6 py-4 font-medium whitespace-nowrap">
                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    
                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                }, function (error) {
                    console.log('Geo location is not supported');
                });
            } else {
                console.log('Geo location is not supported');
            }
        });
    </script>
@endsection