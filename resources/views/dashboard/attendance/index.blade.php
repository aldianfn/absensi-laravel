@extends('dashboard.layout')

@section('dashboard')
    {{-- <div class="flex"> --}}
        <h1 class="text-2xl font-bold">Attendance page</h1>

        <div id="clock" name="clock" class="text-xl font-bold my-4"></div>
        
        <div class="flex gap-4">
            <form id="check-in-form" action="{{ route('dashboard.attendance.checkIn') }}" method="POST">
                @csrf
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                <button type="submit" id="check-in-btn" class="{{ $checkedInStatus ? 'bg-gray-200' : 'bg-blue-400' }} py-2 mt-2 w-32" {{ $checkedInStatus ? 'disabled' : '' }}>Check In</button>
            </form>
            <form id="check-out-form" action="{{ route('dashboard.attendance.checkOut') }}" method="POST">
                {{-- @method('PUT') --}}
                @csrf
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                <button type="submit" id="check-out-btn" class="{{ $checkedOutStatus || !$checkedInStatus ? 'bg-gray-200' : 'bg-blue-400' }} py-2 mt-2 w-32" {{ $checkedOutStatus ? 'disabled' : '' }}>Check Out</button>
            </form>
        </div>
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