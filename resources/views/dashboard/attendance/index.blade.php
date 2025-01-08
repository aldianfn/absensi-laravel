@extends('dashboard.layout')

@section('dashboard')
    {{-- <div class="flex"> --}}
        <h1 class="text-2xl font-bold">Attendance page</h1>

        <div id="clock" name="clock" class="text-xl font-bold my-4"></div>
        
        <form action="{{ route('dashboard.attendance.checkIn') }}" method="POST">
            @csrf
            <div class="flex flex-col w-full">
                <input type="text" name="latitude" id="latitude">
                <input type="text" name="longitude" id="longitude">

                <div class="flex gap-4">
                    <button type="submit" id="get-location" class="{{ $checkedInStatus ? 'bg-gray-200' : 'bg-blue-400' }} py-2 mt-2 w-32" {{ $checkedInStatus ? 'disabled' : '' }}>Check In</button>
                    {{-- Handle form action --}}
                    <button type="submit" id="get-location" class="{{ $checkedOutStatus ? 'bg-gray-200' : 'bg-blue-400' }} py-2 mt-2 w-32" {{ $checkedOutStatus ? 'disabled' : '' }}>Check Out</button>
                </div>
            </div>
        </form>
    {{-- </div> --}}

    <script>
        function formattedTime() {
            var date = new Date();

            var formattedDate = ('0' + date.getHours()).slice(-2) + ':' +
                ('0' + date.getMinutes()).slice(-2) + ':' +
                ('0' + date.getSeconds()).slice(-2) + ' ' +
                ('0' + date.getDate()).slice(-2) + '-' + 
                ('0' + (date.getMonth() + 1)).slice(-2) + '-' +
                (date.getFullYear());

            return formattedDate;
        }

        function updateClock() {
            var currentTime = formattedTime();
            document.getElementById('clock').textContent = currentTime;
        }

        updateClock();
        setInterval(updateClock, 1000);

        $(document).ready(function () {
            // $('#get-location').click(function() {
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
            // });
        });
    </script>
@endsection