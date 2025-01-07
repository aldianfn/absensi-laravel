@extends('dashboard.layout')

@section('dashboard')
    {{-- <div class="flex"> --}}
        <h1 class="text-2xl font-bold">Attendance page</h1>

        <div id="clock" name="clock" class="text-xl font-bold my-4"></div>
        
        <form action="{{ route('dashboard.attendance.store') }}" method="POST">
            @csrf
            <div class="flex flex-col w-full">
                <input type="text" name="latitude" id="latitude">
                <input type="text" name="longitude" id="longitude">

                <button type="submit" id="get-location" class="bg-blue-400 py-2 mt-2 w-32">Get Location</button>
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
                        // $('#check-in').val(formattedTime());

                        // $.ajax({
                        //     url: '{{ route("dashboard.attendance.store") }}',
                        //     method: 'POST',
                        //     data: {
                        //         _token: '{{ csrf_token() }}',
                        //         latitude: latitude,
                        //         longitude: longitude,
                        //         check_in: formattedTime()
                        //     },
                        //     success: function (response) {
                        //         console.log('Data stored successfully: ', response);
                        //     },
                        //     error: function (error) {
                        //         console.log('Error storing data: ', error);
                        //     }
                        // })
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